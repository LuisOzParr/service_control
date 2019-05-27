<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && !Auth::user()->status){
            $guard = Auth::guard();
            $guard->logout();

            return redirect()->route('login')->withErrors('“No tienes permisos para acceder”.');
        }
        return $next($request);
    }
}
