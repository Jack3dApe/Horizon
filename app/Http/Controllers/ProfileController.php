<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\User;

class ProfileController extends Controller
{
    // Exibir o perfil
    public function show()
    {
        $user = auth()->user();
        return view('layouts.clients.profile', compact('user'));
    }

    // Enviar email de ativação
    public function sendActivationEmail(Request $request)
    {

        // Obtém o usuário autenticado
        $user = auth()->user();

        // Verifica se o email já está ativo
        if ($user->is_2fa_enabled) {
            return back()->with('info', __('messages.already_active'));
        }

        // Gera o token e salva no usuário
        $token = Str::random(32);
        $user->activation_token = $token;
        $user->save();

        // Gera o link de ativação assinado
        $activationLink = URL::signedRoute('support.email.activate', [
            'user' => $user->id_user,
            'token' => $token,
        ]);

        // Define o idioma para o template de email
        $lang = app()->getLocale();

        // Envia o email com o link de ativação
        Mail::send("emails.activation_{$lang}", ['link' => $activationLink], function ($message) use ($user) {
            $message->to($user->email)
                ->subject(__('messages.activation_email_subject'));
        });

        return back()->with('success', __('messages.activation_email_sent'));
    }

    // Ativar o email
    public function activateEmail(User $user, $token)
    {
        if ($user->activation_token === $token) {
            $user->is_2fa_enabled = true;
            $user->activation_token = null;
            $user->save();

            return redirect()->route('support.tickets.create')->with('success', __('messages.activation_success'));
        }

        return redirect()->route('support.tickets.create')->with('error', __('messages.activation_failed'));
    }
}
