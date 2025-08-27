<?php

use App\Filament\User\Resources\Segnalazioni\Pages\ListSegnalazioni;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('shows only segnalazioni of the authenticated user in the table', function (): void {
    // Set Filament current panel to the "user" panel
    Filament::setCurrentPanel('user');

    // Create two users
    $userA = User::factory()->create();
    $userB = User::factory()->create();

    // Create a Santo record to satisfy the foreign key
    $santo = Santo::factory()->create();

    // Create segnalazioni for user A (should be visible)
    $this->actingAs($userA);
    $mine = Segnalazione::factory()->count(3)->create([
        'santo_id' => $santo->id,
    ]);

    // Create segnalazioni for user B (should NOT be visible)
    $this->actingAs($userB);
    $others = Segnalazione::factory()->count(2)->create([
        'santo_id' => $santo->id,
    ]);

    // Act as user A for listing
    $this->actingAs($userA);

    // The list page should only show user A's segnalazioni
    Livewire::test(ListSegnalazioni::class)
        ->assertOk()
        ->assertCanSeeTableRecords($mine)
        ->assertCanNotSeeTableRecords($others);
});
