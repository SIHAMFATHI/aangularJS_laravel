<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        /** @var \App\Models\User $user */
           $user = Auth::user();

        if (!$user || !in_array($user->role, $roles)) {
            return response()->json(['message' => 'Access Denied'], 403);
        }

        return $next($request);
    }
}

