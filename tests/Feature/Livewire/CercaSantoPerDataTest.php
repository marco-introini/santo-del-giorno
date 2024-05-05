<?php

use App\Livewire\CercaSantoPerData;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CercaSantoPerData::class)
        ->assertStatus(200);
});
