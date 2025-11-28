<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')
    ->name('home');

Route::view('cerca-per-data', 'cerca-per-data')
    ->name('cerca-per-data');

Route::view('cerca-per-nome', 'cerca-per-nome')
    ->name('cerca-per-nome');
