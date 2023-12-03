<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->rol_usu == 'A') {
                $usuario = [
                    'correo' => auth()->user()->email,
                    'rol' => auth()->user()->rol_usu,
                    'nombre' => auth()->user()->name,
                    'id_usu' => auth()->user()->id
                ];
                session(['usuario' => $usuario]);
                return response()->view('admin.index');
            } else {
                $usuario = [
                    'correo' => auth()->user()->email,
                    'rol' => auth()->user()->rol_usu,
                    'nombre' => auth()->user()->name,
                    'id_usu' => auth()->user()->id
                ];
                session(['usuario' => $usuario]);
                return redirect('/');
            }
        }
    }
}
