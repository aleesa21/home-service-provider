<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in and has 'Admin' role
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        // If unauthorized, return a 403 error
        abort(403, 'allowed xaina la sorry:) jau aaba byee');
    }
}
