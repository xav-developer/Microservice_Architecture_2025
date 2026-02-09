<?php

declare(strict_types=1);

use App\Http\Controllers\MeController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): JsonResponse {
    return response()
        ->json();
});

Route::group([
    'middleware' => [],
], static function (): void {
    Route::get('/me', MeController::class)
        ->name('me');
});
