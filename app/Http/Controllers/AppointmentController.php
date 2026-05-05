<?php

namespace App\Http\Controllers;

use App\Models\Appointment; // Importante para o CRUD
use App\Models\User;        // Necessário para listar clientes no create/edit
use App\Models\Service;     // Necessário para listar serviços no create/edit
use App\Http\Requests\StoreAppointmentRequest; // O seu objeto de validação
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class AppointmentController extends Controller
{
    /**
     * Index.
     */
    public function index(Request $request): View
    {
        $query = Appointment::with(['user', 'service']);

        // Filtro por nome do usuário (Relacionamento)
        if ($request->has('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        return view('appointments.index', [
            'appointments' => $query->get()
        ]);
    }

    /**
     * Create.
     */
    public function create() {

        return view('appointments.create', [
            'users' => User::all(),
            'services' => Service::all()
        ]);
    }

    public function store(Request $request): RedirectResponse {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'scheduled_at' => 'required|date|after:now', // Regra: Não permite data retroativa
        ], [
            'scheduled_at.after' => 'Você não pode agendar um serviço para o passado.'
        ]);

        // Regra de Negócio Extra: Evitar duplicidade de horário
        $exists = Appointment::where('scheduled_at', $request->scheduled_at)->exists();
        if ($exists) {
            return back()->withErrors(['scheduled_at' => 'Este horário já está ocupado.']);
        }

        $appointment = new Appointment;

        $appointment->user_id = $request->user_id;
        $appointment->service_id = $request->service_id;
        $appointment->scheduled_at = $request->scheduled_at;

        $appointment->save();


        return redirect('/appointments');
    }


    /**
     * Edit Appointment.
     */
    public function edit(Appointment $appointment): View { 

        $appointment->load(['user', 'service']);

        return view('appointments.edit', [
            'appointment' => $appointment,
            'users' => User::all(), // Necessário para preencher o <select>
            'services' => Service::all() // Necessário para preencher o <select>
        ]);
    }

    /**
 * Update Appointment.
 */
public function update(Request $request, Appointment $appointment): RedirectResponse {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'scheduled_at' => 'required|date|after:now',
        ], [
            'scheduled_at.after' => 'O novo horário deve ser uma data futura.',
            'user_id.required' => 'O cliente é obrigatório.',
        ]);

        // Atualizando os campos da tabela de agendamentos
        $appointment->user_id = $request->user_id;
        $appointment->service_id = $request->service_id;
        $appointment->scheduled_at = $request->scheduled_at;

        $appointment->save();

        return redirect('/appointments');
    }

    //no agendamento você geralmente aplica uma regra de negócio baseada em tempo 
    //(ex: não permitir cancelar se estiver muito próximo do horário)

    /**
     * Cofirm delete.
     */
    
public function confirmDelete(Request $request, Appointment $appointment): View { 
        // O objeto $request aqui permite, por exemplo, capturar de onde o usuário veio
        // ou passar mensagens flash para a view de confirmação.
        
        return view('appointments.delete', [
            'appointment' => $appointment
        ]);
    }

    /**
     * Delete.
     */
public function delete(Request $request, Appointment $appointment): RedirectResponse { 

        // Regra de Negócio: Impedir exclusão de agendamentos para o dia atual
    // Isso garante que o serviço não seja cancelado "em cima da hora"
    if ($appointment->scheduled_at->isToday()) {
        return back()->withErrors([
            'Não é possível excluir um agendamento marcado para hoje. Entre em contato com o suporte.'
        ]);
    }

    // Opcional: Impedir exclusão se já estiver concluído
    if ($appointment->status === 'concluido') {
        return back()->withErrors([
            'Não é possível excluir um agendamento que já foi realizado.'
        ]);
    }

    $appointment->delete();

    return redirect('/appointments');
}

}