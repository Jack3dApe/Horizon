<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
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

            //return redirect()->intended(route('clients.dashboard'));
            return redirect()->intended(route('home'));
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

    public function forgotPassword(Request $request): View
    {
        return view('loginsignup.forgotpassword.show');
    }

    public function showResetForm($token) {
        return view('loginsignup.resetpassword.show', ['token' => $token]);
    }

    public function resetPassword(Request $request) {
        $credentials = $request->only('email', 'password', 'password_confirmation', 'token');

        $response = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => trans($response)]);
    }
}
