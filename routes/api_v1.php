<?php

use App\Http\Controllers\Api\V1\FonteController;
use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\RequiresJsonMiddleware;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

// SANTI
Route::get('/santo', [SantoDelGiornoController::class, 'index'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.index');

Route::get('/santo/{id}', [SantoDelGiornoController::class, 'show'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.show');

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findByName');

Route::get('/santo/onomastico/{nome}', [SantoDelGiornoController::class, 'findOnomastico'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findOnomastico');

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findByDate');

// FONTE
Route::get('/fonte/{fonte}', [FonteController::class, 'show'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('fonte.show');

