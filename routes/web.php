<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('cerca-per-data', 'cerca-per-data')
    ->name('cerca-per-data');


