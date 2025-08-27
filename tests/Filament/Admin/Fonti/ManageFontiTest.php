<?php

use App\Models\Fonte;
use App\Filament\Admin\Resources\Fonti\Pages\ManageFonti;
use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;

it('renders the manage fonti page and can create a fonte', function (): void {
    Filament::setCurrentPanel('admin');

    $admin = User::factory()->admin()->create();
    $this->actingAs($admin);

    Livewire::test(ManageFonti::class)
        ->assertOk()
        ->callAction('create', data: [
            'nome' => 'Enciclopedia Test',
            'url' => 'https://example.com',
            'note' => 'Fonte di prova',
        ])
        ->assertHasNoErrors();

    expect(Fonte::query()->where('nome', 'Enciclopedia Test')->exists())->toBeTrue();
});
