<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Index.
     */
    public function index(Request $request): View{
        
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            
            
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        return view('users.index', [
            'users' => $query->get()
        ]);
    }

    /**
     * Create.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store.
     */
    public function store(Request $request): RedirectResponse
    { 
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'email.unique' => 'Já existe um user com este e-mail',
        ]);
 
        $user = new User;
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
 
        $user->save();
 
        return redirect('/users');
    }

    /**
     * Edit.
     */
    public function edit(Request $request, User $user): View
    { 
            // Opção A: Apenas o próprio usuário pode editar o seu perfil
        if (Auth::id() !== $user->id) {
            // Erro 403 (Acesso Negado)
            abort(403, 'Você não tem permissão para editar outro usuário.');
        }

        return view('users.edit', [
            'user' => $user
        ]);
    }

   /**
     * Update.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        // 1. Validação atualizada
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // nullable permite que passe em branco. confirmed exige o password_confirmation
            'password' => 'nullable|min:8|confirmed', 
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo e-mail é obrigatório',
            'email.unique' => 'Já existe um usuário com este e-mail',
            'password.min' => 'A senha precisa ter no mínimo 8 caracteres',
            'password.confirmed' => 'A confirmação da senha não confere',
        ]);
 
        // 2. Atualiza os dados básicos
        $user->name = $request->name;
        $user->email = $request->email;
 
        // 3. Verifica se o campo de senha foi preenchido
        if ($request->filled('password')) {
            // Se foi preenchido, criptografa e atualiza a senha no model
            $user->password = Hash::make($request->password);
        }
 
        // 4. Salva no banco de dados
        $user->save();
 
        return redirect('/users')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Cofirm delete.
     */
    public function confirmDelete(Request $request, User $user): View
    { 
        // Opção A: Apenas o próprio usuário pode editar o seu perfil
        if (Auth::id() !== $user->id) {
            // Erro 403 (Acesso Negado)
            abort(403, 'Você não tem permissão para deletar outro usuário.');
        }

        return view('users.delete', [
            'user' => $user
        ]);
    }

    /**
     * Delete.
     */
    public function delete(Request $request, User $user): RedirectResponse
    { 
        $user->delete();
 
        return redirect('/users');
    }


























    

    /*
     * Create phone.
    
    public function createPhone(Request $request, User $user): View
    {
        return view('users.phones.create', [
            'user' => $user
        ]);
    }

    
     * Store phone.
     
    public function storePhone(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'number' => 'required|size:11|unique:phones,number',
        ], [
            'number.required' => 'O campo número é obrigatório',
            'number.size' => 'O número deve ter 11 dígitos (DDD + 9)',
            'number.unique' => 'O número informado já existe',
        ]);

        $user->phones()->create([
            'number' => $request->number
        ]);

        return redirect("/users/{$user->id}");
    }

    
     * Delete phone.
     
    public function deletePhone(Request $request, User $user, Phone $phone): RedirectResponse
    { 
        $phone->delete();
 
        return back();
    }*/
}
