<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');// Your blade file location
    }
    // Handle login submission
    public function loginUser(Request $request)
    {
        // Validate login inputs
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Attempt login
        if (Auth::attempt($credentials)) {

            return redirect('dashbord')->with('success', 'login successful');
        }
        // If login fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('index');
        }

        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }



    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register'); // Your blade file location
    }
    // Handle registration form submission
    public function registerUser(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        // Insert user into database
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Redirect to login page with success message 
        if ($User) {
            return redirect()->route('login')->with('success', 'Account created successfully! Please login.');

        }
    }
    public function dashbordShowForm()
    {
        $userData = User::all();
        $userName = 'guest';

        return view('auth.index', compact('userData', 'userName'));
    }

    // Show Shop page
    public function showShop()
    {
        return view('pages.shop');
    }

    // Show Categories page
    public function showCategories()
    {
        return view('pages.categories');
    }

    // Show Contact page
    public function showContact()
    {
        return view('pages.contact');
    }
}
