<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this area.');
        }

        // Check if user has admin or developer role (using role column)
        $user = auth()->user();
        if (!in_array($user->role, ['admin', 'developer'])) {
            abort(403, 'Unauthorized access. Admin or Developer role required.');
        }

        return $next($request);
    }
}
