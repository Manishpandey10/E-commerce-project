<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          if(Auth::check() && Auth::user()->role_id == 2){
            return redirect()->route('users.dashboard')->with('deniedAdminAcess','You cannot access this page since you are not an admin.');
        }
        return $next($request);
    }
}
