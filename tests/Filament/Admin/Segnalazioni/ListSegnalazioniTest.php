<?php

use App\Filament\Admin\Resources\Segnalazioni\Pages\ListSegnalazioni;
use App\Models\Santo;
use App\Models\Segnalazione;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the list segnalazioni page and respects default evasa=false filter', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $user = User::factory()->create();
    $santo = Santo::factory()->create();

    $nonEvasa = Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'evasa' => false,
    ]);

    $evasa = Segnalazione::factory()->create([
        'user_id' => $user->id,
        'santo_id' => $santo->id,
        'evasa' => true,
    ]);

    Livewire::test(ListSegnalazioni::class)
        ->assertOk()
        ->assertCanSeeTableRecords([$nonEvasa])
        ->assertCanNotSeeTableRecords([$evasa]);
});
