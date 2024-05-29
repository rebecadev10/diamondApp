<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckFacebookRegistration
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->facebook_id) {
            return $next($request);
        }
        
        return redirect()->route('auth.redirect'); // Ruta para redirigir al controlador de Facebook
    }
}
