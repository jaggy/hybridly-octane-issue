<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('one')->group(function () {
                Route::get('/one', function () {
                    return hybridly('one');
                });
            });

            Route::middleware('two')->group(function () {
                Route::get('/two', function () {
                    return hybridly('two');
                });
            });
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->group('one', [
            Illuminate\Cookie\Middleware\EncryptCookies::class,
            Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            Illuminate\Session\Middleware\StartSession::class,
            Illuminate\View\Middleware\ShareErrorsFromSession::class,
            Illuminate\Routing\Middleware\SubstituteBindings::class,
            App\Http\Middleware\HandleHybridRequests::class,
        ]);

        $middleware->group('two', [
            Illuminate\Cookie\Middleware\EncryptCookies::class,
            Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            Illuminate\Session\Middleware\StartSession::class,
            Illuminate\View\Middleware\ShareErrorsFromSession::class,
            Illuminate\Routing\Middleware\SubstituteBindings::class,
            App\Http\Middleware\HandleSecondHybridRequests::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
