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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
   public function handle(Request $request, Closure $next, string $role): Response
{
    if (auth()->check() && auth()->user()->role === $role) {
        return $next($request);
    }

    return response()->json(['message' => 'Akses ditolak.'], 403);
}

}
