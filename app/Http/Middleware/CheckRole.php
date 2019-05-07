<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $role)
    {
        if (auth()->check()) {
            if(auth()->user()->role == 'admin')return $next($request);
            else if(auth()->user()->role == 'guru' && $role == 'adminGuru')return $next($request);
            else return response('Unauthorized.', 401);
        }
        return response('Unauthorized.', 401);
    }
}
