<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail; // ✅ Fix: use correct Mail facade
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str; // ✅ Fix: import Str
use Illuminate\Support\Facades\DB;
use App\Models\User;




class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgotPassword'); // Your blade file location
    }
    public function sendResetLinkEmail(Request $request)
    {
        // Validate email input

        $request->validate([
            'email' => 'required|email|exists:users', // optional: ensures email exists in DB
        ], [
            'email.exists' => 'This email is not registered in our system.',
        ]);
        $user = User::where('email', $request->email)->first();

        $token = str::random(60); // Generate a random token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,

            'created_at' => now(),
        ]);

        Mail::send('auth.emailLink', ['token' => $token, 'email' => $request->email, 'user' => $user], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });
        return back()->with('status', 'We have emailed your password reset link!');
    }
    public function showResetForm($token)
    {
        return view('auth.resetPassword')->with(['token' => $token, 'email' => request('email')]);
    }
    public function resetPassword(Request $request)
    {
        // Validate reset password inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);
        $tokenData = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$tokenData) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete used token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password has been reset!');


        // Reset password logic here
        // $credentials = $request->only('email', 'password', 'token');
        // $response = Password::reset($credentials, function ($user, $password) {
        //     $user->password = Hash::make($password);
        //     $user->save();
        //     Auth::login($user);
        // });
        // return $response === Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('status', __('passwords.reset'))
        //     : back()->withErrors(['email' => __('passwords.user')]);
    }
}
