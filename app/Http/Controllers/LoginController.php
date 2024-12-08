<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Exibe o formulário de login.
     */
    public function showLogin(): View
    {
        return view('loginsignup.login.show');
    }

    /**
     * Processa o login do usuário.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // Credenciais válidas, regenerar a sessão
            $request->session()->regenerate();

            // Verificar o papel do usuário autenticado
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->intended(route('clients.dashboard'));
        }

        // Falha no login
        return redirect()->back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Processa o logout do usuário.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
