<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$roles): Response
    {
            // // Check if the user is logged in
            // if (!Auth::check()) {
            //     return redirect('/loginAdmin'); // Redirect to login if not authenticated
            // }
    
            // $user = Auth::user();
    
            // // Check if user has the required role(s)
            // if (!$user->hasAnyRole($roles)) {
            //     abort(403, 'Unauthorized'); // Abort with 403 if not authorized
            // }
    
            return $next($request);
        }
    }
