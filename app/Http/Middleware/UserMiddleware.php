<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('role') !== 'user') {
            return redirect('/login')->with('error', 'Users only!');
        }

        return $next($request);
    }
}
