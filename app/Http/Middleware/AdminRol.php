<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRol
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
        if(Auth::user()->rol->rol == 'admin' ){
            return $next($request);
        }
        else
        {
            //TODO CERRAR SECION Y MANDAR A LOGIN Y MOSTRA MENSAJE DE ERROR (PUNTO: 11)
            abort(401, 'Unauthorized action.');
        }
    }
}
