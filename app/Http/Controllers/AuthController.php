<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function showLogin()
    {
        return view('components.auth.login');
    }

    // Handle Login (only email required)
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);   // Login without password
            $request->session()->regenerate();
            return redirect('/post-program');
        }

        return back()->withErrors(['email' => 'User not found.']);
    }

    // Show Register Form
    public function showRegister()
    {
        return view('components.auth.register');
    }

    // Handle Registration
    public function register(Request $request)
    {
        $validated = $request->validate([
            'group' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = User::create([
            'group' => $validated['group'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

          // After successful registration
Auth::login($user);
$request->session()->flash('success', 'Account created successfully!');
return redirect('/');

// After login (optional if you want a message)
Auth::login($user);
$request->session()->flash('success', 'Logged in successfully!');
return redirect('/post-program');

    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
