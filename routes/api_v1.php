<?php

use App\Http\Controllers\Api\SantoDelGiornoController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/santo', [SantoDelGiornoController::class,'index'])
    ->middleware(AlwaysAcceptJsonMiddleware::class)
    ->middleware('auth:sanctum');

// TODO: se non lo trova NON torna json
Route::get('/santo/{santo}', [SantoDelGiornoController::class,'show'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);

Route::get('/santo/nome/{nome}', [SantoDelGiornoController::class,'findByName'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);

Route::get('/santo/data/{mese}/{giorno}', [SantoDelGiornoController::class,'findByDate'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);
