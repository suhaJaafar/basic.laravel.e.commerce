<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole {
    public function handle($request, Closure $next, ...$roles) {
    if (!$request->user()) {
        return response()->json(['message' => 'Unauthenticated'], 401);
    }

    if (!in_array($request->user()->role->value, $roles)) {
        return response()->json(['message' => 'Forbidden'], 403);
    }

    return $next($request);
    }
}
