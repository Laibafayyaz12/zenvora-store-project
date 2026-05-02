<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // agar user login nahi hai
        if (!auth()->check()) {
            return redirect('/login');
        }

        // agar admin nahi hai
        if (auth()->user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized Access');
        }

        return $next($request);
    }
}