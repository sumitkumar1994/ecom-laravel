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

        $userData = User::all();     // Fetch all users
        $userName = 'guest';         // Set user name
        return view('admin.users', compact('userData', 'userName'));
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
            if (Auth::user()->role != 3) {
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');

            } else {
                // Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Access denied!');

            }

        }

        // Login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email', 'password');
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
            return redirect()->route('admin.users')->with('success', 'Account created successfully! Please login.');

        }
    }
    // update user into database
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // except this user
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    // delete user 

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }






}
