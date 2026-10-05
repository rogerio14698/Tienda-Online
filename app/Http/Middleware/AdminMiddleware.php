<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    // Handle the incoming request and check for admin role
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if(Auth::check()){
            // Check if the authenticated user is an admin
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }
        }else{
            // Redirect to login if the user is not authenticated
            return redirect('/login');
        }
        abort(401);
        
    }
}
