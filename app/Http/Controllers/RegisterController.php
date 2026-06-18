<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    // Processa o cadastro do novo usuário
    public function register(Request $request)
    {
        // Validação rigorosa dos dados informados
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Exige o campo password_confirmation
        ],  [
            'email.unique' => 'Já existe um usuário com este e-mail',
            'password.min' => 'A senha precisa ser de no mínimo 8 caracteres'
            ] 
        );

        // Cria o usuário salvando a senha criptografada
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Loga o usuário automaticamente após criar a conta
        Auth::login($user);

        // Redireciona para o sistema de tarefas
        return redirect()->route('dashboard.index')->with('success', 'Conta criada com sucesso!');
    }
}
