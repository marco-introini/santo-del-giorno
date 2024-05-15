<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        TreblleMiddleware::class
    ])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware([
        AlwaysAcceptJsonMiddleware::class,
        TreblleMiddleware::class,
        'auth:sanctum'
    ])
    ->name('logout');
