<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Middleware\RequiresJsonMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', fn(Request $request) => $request->user())->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login'])
    ->middleware([
        RequiresJsonMiddleware::class,
    ])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware([
        RequiresJsonMiddleware::class,
        'auth:sanctum'
    ])
    ->name('logout');
