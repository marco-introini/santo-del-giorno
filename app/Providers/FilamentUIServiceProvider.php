<?php

namespace App\Providers;

use Override;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

class FilamentUIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    #[Override]
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Schema::configureUsing(fn(Schema $schema) => $schema
            ->defaultDateDisplayFormat('d/m/Y')
            ->defaultDateTimeDisplayFormat('H:i')
            ->defaultTimeDisplayFormat('d/m/Y H:i'));

        // Configurazione per le Tabelle (TextColumn)
        Table::configureUsing(fn(Table $table) => $table
            ->defaultDateDisplayFormat('d/m/Y')
            ->defaultDateTimeDisplayFormat('d/m/Y H:i')
            ->defaultTimeDisplayFormat( 'H:i'));
    }
}
