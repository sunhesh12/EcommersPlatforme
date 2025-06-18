<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCheckoutStep1Completed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if step 1 is marked as completed (session, DB flag, etc.)
        if (!session('checkout.step1_completed')) {
            // return redirect()->route('custom.error')->with('message', 'Step 1 must be completed first.');
            
            return redirect()->route('custom.error')->with('error', 'Please complete Step 1 first.');
        }

        return $next($request);
    }
}
