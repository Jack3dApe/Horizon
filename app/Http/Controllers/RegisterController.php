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
    protected $messages = [
        'username.required' => 'The username field is required.',
        'username.min' => 'The username must be at least 3 characters.',
        'email.required' => 'The email field is required.',
        'email.unique' => 'This email is already in use.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
        'password.confirmed' => 'Passwords do not match.',
    ];

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
            $user->role = 'clients'; // Definir role padrão
            $user->save();

            // Autenticar o usuário após o registro
            auth()->login($user);

            // Redirecionar para o dashboard do cliente
            return redirect()->route('clients.dashboard')->with('success', "Account created successfully!");

        } catch (\Exception $e) {
            // Em caso de erro, retorna à página de registro
            return redirect()->back()->withErrors(['error' => "Error while creating user: {$e->getMessage()}"])->withInput();
        }
    }
}
