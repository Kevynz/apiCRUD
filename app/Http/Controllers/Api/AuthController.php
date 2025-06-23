<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    /**
     * Mostra a view do formulário de cadastro.
     */
    public function showRegistrationForm()
    {
        return view('register'); // Garanta que você tenha o arquivo resources/views/register.blade.php
    }

    /**
     * Mostra a view do formulário de login.
     */
    public function showLoginForm()
    {
        return view('login'); // Garanta que você tenha o arquivo resources/views/login.blade.php
    }

    /**
     * Processa o registro de um novo usuário para o fluxo WEB.
     */
    public function register(Request $request)
    {
        // Valida os dados que chegam do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Cria o usuário no banco de dados
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Dispara o evento padrão de registro do Laravel
        event(new Registered($user));

        // Faz o login do usuário que acabou de se registrar
        Auth::login($user);

        // Redireciona o usuário para a página inicial (ou um painel)
        return redirect()->route('home');
    }

    /**
     * Processa a tentativa de login para o fluxo WEB.
     */
    public function login(Request $request)
    {
        // Valida as credenciais
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Regenera a sessão para segurança
            $request->session()->regenerate();

            // Redireciona para a página que o usuário tentou acessar antes, ou para a home
            return redirect()->intended(route('home'));
        }

        // Se a autenticação falhar, volta para a página anterior (login) com uma mensagem de erro.
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    /**
     * Processa o logout do usuário para o fluxo WEB.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redireciona o usuário para a página inicial
        return redirect('/');
    }
}