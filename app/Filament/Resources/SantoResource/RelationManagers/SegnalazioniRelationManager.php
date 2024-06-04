<?php

namespace App\Filament\Resources\SantoResource\RelationManagers;

use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SegnalazioniRelationManager extends RelationManager
{
    protected static string $relationship = 'segnalazioni';
    protected static ?string $title = 'Vedi segnalazione';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('testo_segnalazione')
                    ->required()
                    ->rows(10)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('created_at')
                    ->disabled()
                    ->label('Data di creazione'),
                Forms\Components\DatePicker::make('updated_at')
                    ->disabled()
                    ->label('Data ultima modifica'),
                Forms\Components\Section::make('Segnalante')
                    ->schema([
                        Forms\Components\TextInput::make('user.name')
                            ->formatStateUsing(fn (Segnalazione $segnalazione) => $segnalazione->user->name )
                            ->disabled()
                            ->label('Nome'),
                        Forms\Components\TextInput::make('user.email')
                            ->formatStateUsing(fn (Segnalazione $segnalazione) => $segnalazione->user->email )
                            ->disabled()
                            ->label('Nome'),
                    ])->columns(2),


                Forms\Components\Toggle::make('evasa')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('created_at')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data')
                    ->date('d/m/Y H:i'),
                Tables\Columns\IconColumn::make('evasa')
                    ->boolean(),
                Tables\Columns\TextColumn::make('testo_segnalazione')
                    ->limit(60),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
