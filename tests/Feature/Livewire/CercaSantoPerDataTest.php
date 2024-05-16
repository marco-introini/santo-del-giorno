<?php

use App\Livewire\CercaSantoPerData;
use App\Models\Santo;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CercaSantoPerData::class)
        ->assertStatus(200);
});

test('la ricerca torna il santo di oggi', function () {
    $santo = Santo::factory()->create([
        'mese' => now()->month,
        'giorno' => now()->day,
    ]);

    Livewire::test(CercaSantoPerData::class)
        ->set('nome',$santo->nome)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca torna il santo di un giorno scelto', function () {
    $santo = Santo::factory()->create([
        'mese' => now()->month,
        'giorno' => now()->day,
    ]);

    Livewire::test(CercaSantoPerData::class)
        ->set('giorno',$santo->giorno)
        ->set('mese',$santo->mese)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSet('giorno',$santo->giorno)
        ->assertSet('mese',$santo->mese);
});

test('la ricerca torna NON il santo di un altro giorno', function () {
    $santo = Santo::factory()->create([
        'mese' => 10,
        'giorno' => 20,
    ]);

    Livewire::test(CercaSantoPerData::class)
        ->set('giorno',21)
        ->set('mese',11)
        ->assertStatus(200)
        ->assertDontSee($santo->nome)
        ->assertSet('giorno',21)
        ->assertSet('mese',11);
});
