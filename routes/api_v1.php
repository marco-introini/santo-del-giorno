<?php

use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/santo', [SantoDelGiornoController::class, 'index'])
    ->middleware(['always-json','auth:sanctum'])
    ->name('santo.index');

// TODO: se non lo trova NON torna json
Route::get('/santo/{id}', [SantoDelGiornoController::class, 'show'])
    ->middleware(AlwaysAcceptJsonMiddleware::class)
    ->name('santo.show');

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
    ->middleware(AlwaysAcceptJsonMiddleware::class)
    ->name('santo.findByName');

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
    ->middleware(AlwaysAcceptJsonMiddleware::class)
    ->name('santo.findByDate');
