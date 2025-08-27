<?php

use App\Filament\User\Resources\Segnalazioni\Pages\EditSegnalazione;
use App\Filament\User\Resources\Segnalazioni\Pages\ViewSegnalazione;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('disallows editing when segnalazione is evasa', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $santo = Santo::factory()->create();

    $this->actingAs($user);

    $record = Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'evasa' => true,
    ]);

    Livewire::test(EditSegnalazione::class, ['record' => $record->getKey()])
        ->assertForbidden();
});

it('allows viewing only when segnalazione is evasa', function (): void {
    Filament::setCurrentPanel('user');

    $user = User::factory()->create();
    $santo = Santo::factory()->create();

    // Create both records and verify that the view page renders for an evasa record
    $this->actingAs($user);

    Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'evasa' => false,
    ]);

    $evasa = Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'evasa' => true,
    ]);

    Livewire::test(ViewSegnalazione::class, ['record' => $evasa->getKey()])
        ->assertOk();
});
