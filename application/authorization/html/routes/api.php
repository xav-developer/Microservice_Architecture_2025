<?php

declare(strict_types=1);

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): JsonResponse {
    return response()
        ->json();
});

Route::group([
    'middleware' => [
        'web',
        // 'guest',
    ],
], static function (): void {
    Route::post('/register', RegisterController::class)
        ->name('register');

    Route::post('/login', LoginController::class)
        ->name('login');
});

Route::group([
    'middleware' => [
        'web',
        'auth',
    ],
], static function (): void {
    Route::get('/me', MeController::class)
        ->name('me');

    Route::post('/logout', LogoutController::class)
        ->name('logout');
});
