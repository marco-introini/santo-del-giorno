<?php

use App\Filament\Admin\Resources\Santi\Pages\EditSanto;
use App\Models\Fonte;
use App\Models\Santo;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the edit santo page and can update the record', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $fonte = Fonte::factory()->create();
    $santo = Santo::factory()->create([
        'nome' => 'Originale',
        'fonte_id' => $fonte->id,
    ]);

    Livewire::test(EditSanto::class, ['record' => $santo->getKey()])
        ->assertOk()
        ->fillForm([
            'nome' => 'Aggiornato',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($santo->refresh()->nome)->toBe('Aggiornato');
});
