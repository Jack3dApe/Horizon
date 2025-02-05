<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Regras de validação
    protected $rules = [
        'username' => 'required|string|min:3|max:50|unique:users,username',
        'email' => 'required|email|max:100|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // Confirmed exige o campo "password_confirmation"
    ];

    // Mensagens personalizadas
    protected $messages;

    public function __construct()
    {
        $this->messages = [
            'username.required' => __('messages.logsignusernamereq'),
            'username.min' => __('messages.logsignuserminchar'),
            'email.required' => __('messages.logsignemailreq'),
            'email.unique' => __('messages.logsignemailexist'),
            'password.required' => __('messages.logsignpassreq'),
            'password.min' => __('messages.logsignpassminchar'),
            'password.confirmed' => __('messages.logsignpassnotmatch'),
        ];
    }

    /**
     * Show the form for registration.
     */
    public function showSignup()
    {
        return view('loginsignup.signup.show'); // Carregar o formulário de registro
    }

    /**
     * Handle the registration process.
     */
    public function register(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate($this->rules, $this->messages);

        try {
            // Criar o usuário manualmente
            $user = new User();
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->password = Hash::make($validated['password']); // Hash da senha
            $user->assignRole('clients'); // Definir role "clients" pelo Spatie
            $user->save();

            // Autenticar o usuário após o registro
            auth()->login($user);

            // Redirecionar para o dashboard do cliente
            //return redirect()->route('clients.dashboard')->with('success', "Account created successfully!");

            return redirect()->route('home');

        } catch (\Exception $e) {
            // Em caso de erro, retorna à página de registro
            return redirect()->back()->withErrors(['error' => "Error while creating user: {$e->getMessage()}"])->withInput();
        }
    }
}
