<?php

use App\Http\Controllers\Api\V1\FonteController;
use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\RequiresJsonMiddleware;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

Route::middleware([
    RequiresJsonMiddleware::class,
    'auth:sanctum',
    'throttle:chiamate_api',
    TreblleMiddleware::class,
])->prefix('santo')->group(function (): void {
    Route::get('/', [SantoDelGiornoController::class, 'index'])
        ->name('santo.index');

    Route::get('/{id}', [SantoDelGiornoController::class, 'show'])
        ->name('santo.show');

    Route::get('/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
        ->name('santo.findByName');

    Route::get('/onomastico/{nome}', [SantoDelGiornoController::class, 'findOnomastico'])
        ->name('santo.findOnomastico');

    Route::get('/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
        ->name('santo.findByDate');


});


// FONTE
Route::get('/fonte/{fonte}', [FonteController::class, 'show'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('fonte.show');

