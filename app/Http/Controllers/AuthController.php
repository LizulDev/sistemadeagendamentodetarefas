<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Tenta logar o usuário (o Laravel cuida do hash do password automaticamente)
        if (Auth::attempt($credentials, $request->remember)) {

            // Regenera a sessão por segurança (evita fixação de sessão)
            $request->session()->regenerate();

            return redirect()->route('dashboard.index')->with('success', 'Login bem sucedido!');
        }

        // Se falhar, retorna com erro para a tela anterior
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    // Processa o logout
    public function logout(Request $request) {
       
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

}
