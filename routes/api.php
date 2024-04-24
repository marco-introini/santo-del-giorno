<?php

use App\Http\Controllers\Api\SantoDelGiornoController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/santo', [SantoDelGiornoController::class,'index'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);

// TODO: se non lo trova NON torna json
Route::get('/santo/{santo}', [SantoDelGiornoController::class,'show'])
    ->middleware(AlwaysAcceptJsonMiddleware::class);
