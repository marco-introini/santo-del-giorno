<?php

use App\Livewire\CercaSantoPerNome;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CercaSantoPerNome::class)
        ->assertStatus(200);
});
