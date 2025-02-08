<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Models\User;

class PasswordRecoveryController extends Controller
{
    public function recover(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Gera o token de redefinição de senha
            $token = Password::createToken($user);

            // Gera o link de redefinição
            $resetLink = URL::route('password.reset', ['token' => $token, 'email' => $user->email]);

            // Define o idioma atual
            $lang = app()->getLocale();

            // Envia o email com base no idioma
            Mail::send("emails.password_reset_{$lang}", ['link' => $resetLink], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject(__('messages.logsignpassresetlink'));
            });

            return back()->with('success', __('messages.logsignpassresetlink'));
        }

        return back()->withErrors(['error' => __('messages.logsignnoaccountemail')]);
    }
}
