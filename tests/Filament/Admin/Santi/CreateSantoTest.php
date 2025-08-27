<?php

use App\Models\Santo;
use App\Filament\Admin\Resources\Santi\Pages\CreateSanto;
use App\Models\Fonte;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the create santo page and can create a record', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $fonte = Fonte::factory()->create();

    Livewire::test(CreateSanto::class)
        ->assertOk()
        ->fillForm([
            'nome' => 'San Test',
            'mese' => 5,
            'giorno' => 12,
            'fonte_id' => $fonte->id,
            'note' => 'Nota di test',
            'onomastico' => true,
            'onomastico_secondario' => false,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect();

    expect(Santo::query()->where('nome', 'San Test')->exists())->toBeTrue();
});
