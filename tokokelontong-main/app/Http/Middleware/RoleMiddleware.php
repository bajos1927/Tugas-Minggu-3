<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login dulu');
        }

        if (session('role') !== $role) {
            return abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
