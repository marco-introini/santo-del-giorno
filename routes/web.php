<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cerca-per-data', \App\Livewire\CercaSantoPerData::class);
