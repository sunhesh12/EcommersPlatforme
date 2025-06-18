<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()){
            return redirect()->route('user.loginn')->with('error', 'Please login to access this page.');
        }

        // if(Auth::user()->is_admin == 1){
        //     return redirect()->route('admin.dashboard')->with('error', 'You are already logged in as an admin.');
        // }
        // if(Auth::user()->is_admin == 0){
        //     return redirect()->route('home')->with('error', 'You are already logged in as a user.');
        // }
        return $next($request);
    }
}
