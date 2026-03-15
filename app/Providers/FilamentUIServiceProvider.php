<?php

namespace App\Providers;

use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

class FilamentUIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \Filament\Schemas\Schema::configureUsing(function (\Filament\Schemas\Schema $schema) {
            return $schema
                ->defaultDateDisplayFormat('d/m/Y')
                ->defaultDateTimeDisplayFormat('H:i')
                ->defaultTimeDisplayFormat('d/m/Y H:i');
        });

        // Configurazione per le Tabelle (TextColumn)
        Table::configureUsing(function (Table $table) {
            return $table
                ->defaultDateDisplayFormat('d/m/Y')
                ->defaultDateTimeDisplayFormat('d/m/Y H:i')
                ->defaultTimeDisplayFormat( 'H:i');
        });
    }
}
