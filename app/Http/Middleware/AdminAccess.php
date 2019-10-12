<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    public function handle($request, Closure $next, $trust)
    {
        if(!Auth::user()->isAdmin($trust)) {
            return redirect('/home')->with('error', 'Access to admin only');
        }

        return $next($request);
    }
}
