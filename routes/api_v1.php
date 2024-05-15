<?php

use App\Http\Controllers\Api\V1\FonteController;
use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use Illuminate\Support\Facades\Route;

// SANTI
Route::get('/santo', [SantoDelGiornoController::class, 'index'])
    ->middleware([
        \App\Http\Middleware\AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        \Treblle\Middlewares\TreblleMiddleware::class
    ])
    ->name('santo.index');

Route::get('/santo/{id}', [SantoDelGiornoController::class, 'show'])
    ->middleware([
        \App\Http\Middleware\AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        \Treblle\Middlewares\TreblleMiddleware::class
    ])
    ->name('santo.show');

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
    ->middleware([
        \App\Http\Middleware\AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        \Treblle\Middlewares\TreblleMiddleware::class
    ])
    ->name('santo.findByName');

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
    ->middleware([
        \App\Http\Middleware\AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        \Treblle\Middlewares\TreblleMiddleware::class
    ])
    ->name('santo.findByDate');

// FONTE
Route::get('/fonte/{fonte}', [FonteController::class, 'show'])
    ->middleware([
        \App\Http\Middleware\AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        \Treblle\Middlewares\TreblleMiddleware::class
    ])
    ->name('fonte.show');

