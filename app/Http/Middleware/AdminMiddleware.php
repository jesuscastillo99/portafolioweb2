<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verificar si el usuario está autenticado y es administrador
         if (Auth::check() && Auth::user()->role) { // Si el campo "role" es true, es administrador
            return $next($request);
        }

        // Si no es administrador, redirigir a otra ruta o mostrar un error
        return redirect('/accesodenegado')->with('error', 'Acceso no autorizado.');
    }
}
