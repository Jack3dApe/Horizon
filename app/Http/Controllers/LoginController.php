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


            //Merge do carrinho do guest com o da conta logged
            app(CartController::class)->merge();

            // Verificar o papel do usuário autenticado
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }

            //return redirect()->intended(route('clients.dashboard'));
            return redirect()->intended(route('home'));
        }

        // Falha no login
        return redirect()->back()->withErrors([
            'error' => __('messages.logsignwrongcred'),
        ])->onlyInput('email');
    }

    /**
     * Processa o logout do usuário.
     */
    public function logout(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            $id_user = Auth::id();
            $cart = session()->get('cart', []);

            // Guardar o cart do user
            foreach ($cart as $id_game => $item) { // A chave do array é o id_game
                // Verificar se o jogo já está no carrinho do usuário
                $existingCart = \App\Models\Cart::where('id_user', $id_user)
                    ->where('id_game', $id_game)
                    ->first();

                if (!$existingCart) {
                    \App\Models\Cart::create([
                        'id_user' => $id_user,
                        'id_game' => $id_game,
                    ]);
                }
            }

            // Limpar a variável de sessão do carrinho
            session()->forget('cart');
        }
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
            return redirect()->route('login')->with('status', __('messages.logsignsuccpassreset'));
        }

        return back()->withErrors(['email' => trans($response)]);
    }
}
