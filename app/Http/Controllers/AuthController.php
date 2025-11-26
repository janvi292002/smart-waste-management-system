<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show register form
    public function register()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Check if user already exists
        $existingUser = User::where('email', $request->email)
                            ->orWhere('name', $request->name)
                            ->first();
        if ($existingUser) {
            return back()->with('error', 'User already exists!');
        }

        // Create user only
        User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);

        // Redirect to login page
        return redirect('/login')->with('success', 'Registration successful! Please login.');
    }

    // Show login form
    public function login()
    {
        return view('auth.login');
    }

    // Handle login
    public function loginPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        // ===== ADMIN LOGIN =====
        if ($request->role === 'admin') {
            $admin = Admin::where('email', $request->email)->first();

            // If admin doesn't exist, create dynamically
            if (!$admin) {
                $admin = Admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
            }

            // Store session
            session([
                'role' => 'admin',
                'admin_id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
            ]);

            return redirect('/admin/dashboard');
        }

        // ===== USER LOGIN =====
        if ($request->role === 'user') {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return back()->with('error', 'User not found. Please register first.');
            }

            session([
                'role' => 'user',
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]);

            return redirect('/user/dashboard');
        }

        return back()->with('error', 'Invalid role selected');
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
