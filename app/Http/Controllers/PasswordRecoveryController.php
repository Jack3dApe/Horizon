<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class PasswordRecoveryController extends Controller
{
    public function recover(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user) {
            //$password = $user->password;

            //Mail::raw("Your password is: $password", function ($message) use ($user) {
                //$message->to($user->email)
                    //->subject('Password Recovery');
            //});
            $response = Password::sendResetLink(
                $request->only('email')
            );

            if ($response == Password::RESET_LINK_SENT) {
                return back()->with('success', __('messages.logsignpassresetlink'));
            }

            return back()->withErrors(['error' => __('messages.logsignpassfaillink')]);
        } else {
            return back()->withErrors(['error' => __('messages.logsignnoaccountemail')]);
        }
    }
}
