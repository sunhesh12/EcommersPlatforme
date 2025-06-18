<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckLogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'checkLogin' => CheckLogin::class,
            'checkout.step1' => \App\Http\Middleware\EnsureCheckoutStep1Completed::class,
            'checkout.step2' => \App\Http\Middleware\EnsureCheckoutStep2Completed::class,
            'checkout.step3' => \App\Http\Middleware\EnsureCheckoutStep3Completed::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
