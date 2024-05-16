<?php

use App\Livewire\CercaSantoPerNome;
use App\Models\Santo;
use Livewire\Livewire;

test('mostra un santo', function () {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca torna il santo', function () {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->set('nome',$santo->nome)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});


test('la ricerca NON torna il santo se la query è diversa', function () {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->set('nome', 'XXX')
        ->assertStatus(200)
        ->assertDontSee($santo->nome);
});
