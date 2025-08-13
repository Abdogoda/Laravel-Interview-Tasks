<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPermissionsMiddleware
{
    public function handle(Request $request, Closure $next, string ...$permissions): Response
    {
        if (!$request->user()->hasPermissions($permissions)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $next($request);
    }
}
