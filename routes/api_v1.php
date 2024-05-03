<?php

use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/santo', [SantoDelGiornoController::class, 'index'])
    ->middleware(AlwaysAcceptJsonMiddleware::class, 'auth:sanctum');

// TODO: se non lo trova NON torna json
Route::get('/santo/{santo}', [SantoDelGiornoController::class, 'show'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);
