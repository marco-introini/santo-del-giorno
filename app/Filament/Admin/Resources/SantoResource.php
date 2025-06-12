<?php

namespace App\Filament\Admin\Resources;

use App\Models\Santo;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SantoResource extends Resource
{
    protected static ?string $model = Santo::class;

    protected static ?string $slug = 'santi';

    protected static ?string $pluralLabel = 'Santi';
    protected static ?string $label = 'Santo';

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    #[\Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('fonte_id')
                    ->relationship('fonte', 'nome'),
                TextInput::make('mese')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(12),
                TextInput::make('giorno')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(31),
                Textarea::make('note')
                    ->columnSpanFull(),
                Forms\Components\Section::make('Onomastico')
                    ->schema([
                        Forms\Components\Toggle::make('onomastico')
                            ->label('Onomastico Primario')
                            ->default(false),
                        Forms\Components\Toggle::make('onomastico_secondario')
                            ->default(false),
                    ])
                    ->columns(2)
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mese')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('giorno')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('onomastico')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('segnalazioni_count')
                    ->label('N. Segnalazioni')
                    ->counts('segnalazioni')
                    ->sortable(),
            ])
            ->filters([
                //
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

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\SantoResource\Pages\ListSanti::route('/'),
            'create' => \App\Filament\Admin\Resources\SantoResource\Pages\CreateSanto::route('/create'),
            'edit' => \App\Filament\Admin\Resources\SantoResource\Pages\EditSanto::route('/{record}/edit'),
        ];
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            \App\Filament\Admin\Resources\SantoResource\RelationManagers\SegnalazioniRelationManager::class,
        ];
    }
}
