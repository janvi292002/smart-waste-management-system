<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('role') !== 'admin') {
            return redirect('/login')->with('error', 'Admins only!');
        }

        return $next($request);
    }
}
