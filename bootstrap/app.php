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
            'hrmpsb' => App\Http\Middleware\Auth\HRMPSBMiddleware::class,
            'hrmo' => App\Http\Middleware\Auth\HRMOMiddleware::class,
            'appointing_officer' => App\Http\Middleware\Auth\AppointingOfficerMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
