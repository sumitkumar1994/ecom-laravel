<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.adminlogin');
    }
    public function users()
    {
        return view('admin.users');
    }
    // Handle the admin login
    public function login(Request $request)
    {
        // Validate form input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

}
