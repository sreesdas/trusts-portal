<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessControl
{
    public function handle($request, Closure $next, $trust)
    {
        // if(!Auth::user()->isTrustee($trust) && !Auth::user()->isMember()) {
        //     return redirect('/home')->with('error', 'Unauthorized');
        // }

        return $next($request);
    }
}
