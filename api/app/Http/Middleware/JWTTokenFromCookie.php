<?php

namespace App\Http\Middleware;

use Closure;


class JWTTokenFromCookie
{
    public function handle($request, Closure $next)
    {
        if (!$request->bearerToken()) {
            $token = $request->cookie('jwt');
            if ($token) {
                request()->headers->set('Authorization', 'Bearer ' . $token);
            }
        }

        return $next($request);
    }
}

