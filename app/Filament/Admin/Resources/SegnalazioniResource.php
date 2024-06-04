<?php

namespace App\Filament\Admin\Resources;

use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SegnalazioniResource extends Resource
{
    protected static ?string $model = Segnalazione::class;

    protected static ?string $pluralLabel = "Segnalazioni";
    protected static ?string $label = "Segnalazione";

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->disabled(),
                Forms\Components\Select::make('santo_id')
                    ->relationship('santo', 'nome'),
                Forms\Components\Textarea::make('testo_segnalazione')
                    ->columnSpanFull()
                    ->rows(10)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ToggleColumn::make('evasa')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data')
                    ->sortable()
                    ->searchable()
                    ->date('d/m/Y H:i'),
                Tables\Columns\TextColumn::make('testo_segnalazione')
                    ->limit(100)
                    ->wrap()
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'DESC')
            ->filters([
                Tables\Filters\TernaryFilter::make('evasa')
                    ->default(false)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\SegnalazioniResource\Pages\ListSegnalazioni::route('/'),
            'create' => \App\Filament\Admin\Resources\SegnalazioniResource\Pages\CreateSegnalazione::route('/create'),
            'edit' => \App\Filament\Admin\Resources\SegnalazioniResource\Pages\EditSegnalazione::route('/{record}/edit'),
        ];
    }
}
