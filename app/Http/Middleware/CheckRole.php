<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * ///@param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        
        $userRole = $request->header('X-Role'); 

        if ($userRole === $role) {
        return $next($request);
    }
    return response()->json([
        'message' => 'Akses ditolak! Hanya admin yang dapat melakukan operasi ini.'
    ], 403);
}
}
