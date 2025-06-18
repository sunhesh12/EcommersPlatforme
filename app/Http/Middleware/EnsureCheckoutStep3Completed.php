<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCheckoutStep3Completed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle($request, Closure $next)
{
    if (!session('checkout.step3_completed')) {
        return redirect()->route('custom.error')->with('message', 'Please complete Step 3 first.');
    }

    return $next($request);
}

}
