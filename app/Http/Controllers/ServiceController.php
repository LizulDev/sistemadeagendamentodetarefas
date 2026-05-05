<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Index.
     */
    public function index(Request $request): View
    {
        // Filtro de busca (Requisito obrigatório)
        $query = Service::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return view('services.index', [
            'services' => $query->get()
        ]);
    
    }

    /**
     * Create.
     */
    public function create(): View
    {
        return view('services.create');
    }

    /**
     * Store.
     */
    public function store(Request $request): RedirectResponse
    { 
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
        ], [
            'name.required' => 'O campo nome é obrigatório',
        ]);
 
        $service = new Service;
 
        $service->name = $request->name;
        $service->price = $request->price;
        $service->description = $request->description;
 
        $service->save();
 
        return redirect('/services');
    }

    /**
     * Edit.
     */
    public function edit(Request $request, Service $service): View
    { 
        //$service->load('services');

        return view('services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required|max:255',
        ], [
            'name.required' => 'O campo nome é obrigatório',
        ]);
 
        $service->name = $request->name;
        $service->price = $request->price;
 
        $service->save();
 
        return redirect('/services');
    }

    /**
     * Confirm delete.
     */
    public function confirmDelete(Request $request, Service $service): View {
    

        // 2. Verifica se o serviço existe (opcional, mas boa prática)
        if (!$service) {
            return redirect('/services')->with('error', 'Serviço não encontrado.');
        }

        // 3. Passa a variável para a view 'services.delete'
        return view('services.delete', compact('service'));

    }

    /**
     * Delete.
     */
    public function delete(Request $request, Service $service): RedirectResponse
    { 
        $service->delete();
 
        return redirect('/services').with('success','Serviço removido com sucesso!');
    }

    
}
