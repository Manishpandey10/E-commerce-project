<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cartAccessDenied
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response{
     if(Auth::check() && Auth::user()->role_id == 2){
            return redirect()->route('front.login')->with('noCheckoutAccess','You Need to login first.');
        }
        return $next($request);
}
}