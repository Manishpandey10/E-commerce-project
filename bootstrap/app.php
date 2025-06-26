<?php

use App\Http\Middleware\AdminAccess;
use App\Http\Middleware\AdminRedirect;
use App\Http\Middleware\cartAccessDenied;
use App\Http\Middleware\isAdminLoggedIn;
use App\Http\Middleware\isUserLoggedIn;
use App\Http\Middleware\UserAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth.access'=>isUserLoggedIn::class,
            'admin.access'=>isAdminLoggedIn::class,
            'auth.custom'=>AdminRedirect::class,
            'is.user'=>UserAccess::class,
            'is.admin'=>AdminAccess::class,
            'cart.access'=>cartAccessDenied::class
            
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
