<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\CanEditBlogMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->alias(['can-edit-blog' => CanEditBlogMiddleware::class]);
        $middleware->alias(['is_admin' => IsAdminMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();