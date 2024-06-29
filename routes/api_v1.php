<?php

use App\Http\Controllers\Api\V1\FonteController;
use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

// SANTI
Route::get('/santo', [SantoDelGiornoController::class, 'index'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.index');

Route::get('/santo/{id}', [SantoDelGiornoController::class, 'show'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.show');

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findByName');

Route::get('/santo/onomastico/{nome}', [SantoDelGiornoController::class, 'findOnomastico'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findOnomastico');

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('santo.findByDate');

// FONTE
Route::get('/fonte/{fonte}', [FonteController::class, 'show'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('fonte.show');

