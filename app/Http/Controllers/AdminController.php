<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
    public function showAddUserForm()
    {
        return view('admin.addUser');
    }
    // Handle the admin login
    public function adminlogin(Request $request)
    {
        // Validate form input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');

            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Access denied!');

            }

        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    public function createUser(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        // Insert user into database
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
        ]);
        // Redirect to login page with success message 
        if ($User) {
            return redirect()->route('users')->with('success', 'Account created successfully! Please login.');

        }
    }


}
