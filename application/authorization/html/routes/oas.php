<?php

declare(strict_types=1);

use App\Http\Controllers\SwaggerController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/oas',
    'as' => 'oas.',
], static function (): void {
    Route::get('/swagger', SwaggerController::class)
        ->name('swagger');

    Route::get('/api.json', [VersionController::class, 'api'])
        ->name('api');
});
