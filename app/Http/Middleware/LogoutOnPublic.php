<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutOnPublic
{

    protected $publicRoutes = [
        'login',
        'loginpage',
        'registerpage',
        'register',
        'index',
        '/',
    ];

    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and accessing a public route
        if (Auth::check() && in_array($request->route()->getName(), $this->publicRoutes)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return $next($request);
    }
}
