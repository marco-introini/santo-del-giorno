<?php

use App\Livewire\CercaSantoPerNome;
use App\Models\Santo;
use Livewire\Livewire;

test('mostra un santo', function (): void {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca torna il santo', function (): void {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->set('nome', $santo->nome)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca NON torna il santo se la query è diversa', function (): void {
    $santo = Santo::factory()->create();

    Livewire::test(CercaSantoPerNome::class)
        ->set('nome', 'XXX')
        ->assertStatus(200)
        ->assertDontSee($santo->nome);
});

test('la ricerca torna il santo con onomastico primario', function (): void {
    $santo = Santo::factory()->create([
        'onomastico' => true,
        'onomastico_secondario' => false,
    ]);

    Livewire::test(CercaSantoPerNome::class)
        ->set('onomastico', true)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca torna il santo con onomastico secondario', function (): void {
    $santo = Santo::factory()->create([
        'onomastico' => true,
        'onomastico_secondario' => true,
    ]);

    Livewire::test(CercaSantoPerNome::class)
        ->set('onomastico', true)
        ->assertStatus(200)
        ->assertSee($santo->nome)
        ->assertSee($santo->giorno)
        ->assertSee($santo->mese);
});

test('la ricerca non torna il santo senza onomastico se imposto solo onomastico', function (): void {
    $santo = Santo::factory()->create([
        'onomastico' => false,
        'onomastico_secondario' => false,
    ]);

    Livewire::test(CercaSantoPerNome::class)
        ->set('onomastico', true)
        ->assertStatus(200)
        ->assertDontSee($santo->nome);
});
