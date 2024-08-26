<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'applicant' => App\Http\Middleware\Auth\ApplicantMiddleware::class,
            'superadmin' => App\Http\Middleware\Auth\SuperAdminMiddleware::class,
            'hiring_board' => App\Http\Middleware\Auth\HiringBoardMiddleware::class,
            'admin' => App\Http\Middleware\Auth\AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
