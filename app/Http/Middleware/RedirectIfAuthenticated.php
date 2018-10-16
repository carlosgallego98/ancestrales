<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch (Auth::guard()) {
            case 'empleado':
                return redirect()->route('panel');
                break;
            case 'proveedor':
                return redirect('/proveedores');
                break;
            case 'web':
                return redirect('/');
                break;       
        }

        return $next($request);
    }
}
