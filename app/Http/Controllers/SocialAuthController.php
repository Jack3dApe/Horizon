<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->user();

            $user = User::firstOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'username' => $githubUser->getNickname(),
                    'profile_pic' => $githubUser->getAvatar(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            // Logar o usuário
            Auth::login($user, true);

            return redirect()->route('home')->with('success', 'Successfully logged in with GitHub!');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to login with GitHub.');
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'username' => $googleUser->getName(),
                'profile_pic' => $googleUser->getAvatar(),
                'password' => bcrypt(Str::random(16)),
            ]
        );

        Auth::login($user);

        return redirect()->route('home');
    }

}
