<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\MailResetPasswordNotification;

class PasswordResetController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'We can\'t find a user with that email address.']);
        }

        $token = Str::random(60);
        $tokenData = [
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
         ];

    $tokenEntry = DB::table('password_reset_tokens')->where('email', $request->email)->first();
    if ($tokenEntry) {
        DB::table('password_reset_tokens')->where('email', $request->email)->update($tokenData);
    } else {
        DB::table('password_reset_tokens')->insert($tokenData);
    }

    $resetLink = url('/password/reset/' . $token . '?email=' . urlencode($user->email));
    $resetLink = str_replace('http://localhost', 'http://localhost:8080', $resetLink);


    $user->notify(new MailResetPasswordNotification($token, $resetLink));


    return back()->with('message', 'We have e-mailed your password reset link!');
}

    public function showResetForm(Request $request, $token)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $request->query('email')]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|min:6|confirmed',
        ]);
    
        $record = DB::table('password_reset_tokens')->where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
    
        if (!$record || Carbon::parse($record->created_at)->lte(now()->subMinutes(20))) {
            return back()->withErrors(['email' => 'This password reset token is invalid or has expired.']);
        }
    
        $user = User::where('email', $request->email)->first();
        $newSalt = Str::random(32);
        $hashedPassword = hash('sha256', $request->password . $newSalt);
        $user->password = $hashedPassword;
        $user->salt = $newSalt;
        $user->save();
    
        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
    
        return redirect('/login')->with('message', 'Your password has been reset!');
    }
}