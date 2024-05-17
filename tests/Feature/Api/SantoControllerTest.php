<?php

use App\Models\Fonte;
use App\Models\Santo;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
   $user = User::factory()->create();
   actingAs($user);
});


test('a saint returns', function (){
    $santo = Santo::factory()->create();

    $response = get(route('santo.show',$santo->id));

    $response->assertStatus(200);
    expect($response->json('data.type'))->toBe('santo')
        ->and($response->json('data.attributes.nome'))->toBe($santo->nome)
        ->and($response->json('data.attributes.mese'))->toBe($santo->mese)
        ->and($response->json('data.attributes.giorno'))->toBe($santo->giorno);
});

test('list saints', function (){
    Santo::factory(10)->create();

    $response = get(route('santo.index'));

    $response->assertStatus(200);
    $response->assertJsonCount(10,'data');
    foreach (Santo::all() as $santo){
        $response->assertJsonFragment(['nome' => $santo->nome]);
    }
});


