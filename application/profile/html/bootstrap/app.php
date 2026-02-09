<?php

declare(strict_types=1);

use App\Http\Middleware\XApiKey;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__ . '/../routes/web.php',
            __DIR__ . '/../routes/oas.php',
        ],
        api: [
            __DIR__ . '/../routes/api.php',
        ],
        commands: __DIR__ . '/../routes/console.php',
        health: '/health',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware
            ->api(
                append: [
                    XApiKey::class,
                ],
            );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
    })->create();
