<?php

namespace App\Filament\Admin\Resources\SantoResource\RelationManagers;

use Override;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SegnalazioniRelationManager extends RelationManager
{
    protected static string $relationship = 'segnalazioni';
    protected static ?string $title = 'Vedi segnalazione';

    #[Override]
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('testo_segnalazione')
                    ->required()
                    ->rows(10)
                    ->columnSpanFull(),
                DatePicker::make('created_at')
                    ->disabled()
                    ->label('Data di creazione'),
                DatePicker::make('updated_at')
                    ->disabled()
                    ->label('Data ultima modifica'),
                Section::make('Segnalante')
                    ->schema([
                        TextInput::make('user.name')
                            ->formatStateUsing(fn (Segnalazione $segnalazione) => $segnalazione->user->name )
                            ->disabled()
                            ->label('Nome'),
                        TextInput::make('user.email')
                            ->formatStateUsing(fn (Segnalazione $segnalazione) => $segnalazione->user->email )
                            ->disabled()
                            ->label('Nome'),
                    ])->columns(2),


                Toggle::make('evasa')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('created_at')
            ->columns([
                TextColumn::make('created_at')
                    ->label('Data')
                    ->date('d/m/Y H:i'),
                IconColumn::make('evasa')
                    ->boolean(),
                TextColumn::make('testo_segnalazione')
                    ->limit(60),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
