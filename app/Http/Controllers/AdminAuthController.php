<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Show admin login form
   public function showLoginForm()
    {
        return view('admin.login'); // your login blade
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Find admin by username
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Store session (you can also use Auth if you prefer)
            session(['admin_id' => $admin->id]);

            return redirect()->route('dashboard-page') // change to your dashboard route
                ->with('success', 'Welcome back, '.$admin->username.'!');
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login');
    }
}
