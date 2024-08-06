<?php

namespace App\Http\Middleware;

use App\Models\Administrateur;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class OptionalAuth
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($token = $request->bearerToken()) {
            $accessToken = PersonalAccessToken::findToken($token);

            if ($accessToken && $accessToken->tokenable instanceof Administrateur) {
                Auth::setUser($accessToken->tokenable);
            }
        }

        return $next($request);
    }
}
