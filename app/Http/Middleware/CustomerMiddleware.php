<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{

    public function handle($request, Closure $next, $guard = 'cus')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('homepage.login');
        }
        return $next($request);
    }
}
