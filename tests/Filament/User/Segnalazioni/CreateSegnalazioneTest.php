<?php

use App\Enums\TipoSegnalazione;
use App\Filament\User\Resources\Segnalazioni\Pages\CreateSegnalazione;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the create segnalazione page and can create a record', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $santo = Santo::factory()->create();

    $this->actingAs($user);

    Livewire::test(CreateSegnalazione::class)
        ->assertOk()
        ->fillForm([
            'santo_id' => $santo->id,
            'tipo_segnalazione' => TipoSegnalazione::cases()[0]->value,
            'testo_segnalazione' => 'Test segnalazione',
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertRedirect();

    expect(Segnalazione::query()->where('user_id', $user->id)->count())->toBe(1);
});
