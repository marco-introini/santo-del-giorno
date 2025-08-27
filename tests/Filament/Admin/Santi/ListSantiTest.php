<?php

use App\Filament\Admin\Resources\Santi\Pages\ListSanti;
use App\Models\Santo;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the list santi page and shows records', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    $records = Santo::factory()->count(3)->create();

    Livewire::test(ListSanti::class)
        ->assertOk()
        ->assertCanSeeTableRecords($records);
});
