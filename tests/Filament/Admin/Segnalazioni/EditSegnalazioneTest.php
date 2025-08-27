<?php

use App\Filament\Admin\Resources\Segnalazioni\Pages\EditSegnalazione;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the edit segnalazione page and can update testo', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $user = User::factory()->create();
    $santo = Santo::factory()->create();

    $record = Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'testo_segnalazione' => 'Vecchio testo',
        'evasa' => false,
    ]);

    Livewire::test(EditSegnalazione::class, ['record' => $record->getKey()])
        ->assertOk()
        ->fillForm([
            'testo_segnalazione' => 'Nuovo testo',
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($record->refresh()->testo_segnalazione)->toBe('Nuovo testo');
});
