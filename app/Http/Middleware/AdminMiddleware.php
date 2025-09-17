<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Only allow logged-in users who are admins
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Otherwise, redirect to admin login
        return redirect()->route('admin.login')->withErrors([
            'username' => 'You must be an admin to access this page.'
        ]);
    }
}
