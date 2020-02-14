<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class AdminMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'Error: El token no es válido.']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'Error: El token ha expirado.']);
            } else {
                return response()->json(['status' => 'Error: No se encontró el token de autorización.']);
            }
        }

        // Si en el campo "admin" tienen 1, el usuario es administrador y puede pasar
        if ($user->admin == 1) {
            // Puedes pasar el middleware
            return $next($request);
        } else {
            return response()->json(['status' => 'Error: Oops, no eres administrador, así que no puedes pasar.']);
        }
    }
}
