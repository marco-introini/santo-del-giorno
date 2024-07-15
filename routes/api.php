<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Middleware\RequiresJsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Treblle\Middlewares\TreblleMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware([
        RequiresJsonMiddleware::class,
        TreblleMiddleware::class
    ])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware([
        RequiresJsonMiddleware::class,
        TreblleMiddleware::class,
        'auth:sanctum'
    ])
    ->name('logout');
