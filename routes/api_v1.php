<?php

use App\Http\Controllers\Api\V1\FonteController;
use App\Http\Controllers\Api\V1\SantoDelGiornoController;
use App\Http\Middleware\RequiresJsonMiddleware;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

Route::middleware([
    RequiresJsonMiddleware::class,
    'auth:sanctum',
    TreblleMiddleware::class,
])->prefix('santo')->group(function () {
    Route::get('/', [SantoDelGiornoController::class, 'index'])
        ->name('santo.index');

    Route::get('/{id}', [SantoDelGiornoController::class, 'show'])
        ->name('santo.show');

    Route::get('/nome/{nome}', [SantoDelGiornoController::class, 'findByName'])
        ->name('santo.findByName');

    Route::get('/onomastico/{nome}', [SantoDelGiornoController::class, 'findOnomastico'])
        ->name('santo.findOnomastico');

    Route::get('/data/{mese}/{giorno}', [SantoDelGiornoController::class, 'findByDate'])
        ->where(['mese' => 'int', 'giorno' => 'int'])
        ->name('santo.findByDate');

    Route::get('/data/{mese}/{giorno}', function () {
        return response()->json(['message' => 'Errore: è necessario passare due interi come giorno e mese'], 404);
    });
});


// FONTE
Route::get('/fonte/{fonte}', [FonteController::class, 'show'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum',
        TreblleMiddleware::class
    ])
    ->name('fonte.show');

