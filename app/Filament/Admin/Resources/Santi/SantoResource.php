<?php

namespace App\Filament\Admin\Resources\Santi;

use BackedEnum;
use Override;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Admin\Resources\Santi\Pages\ListSanti;
use App\Filament\Admin\Resources\Santi\Pages\CreateSanto;
use App\Filament\Admin\Resources\Santi\Pages\EditSanto;
use App\Filament\Admin\Resources\Santi\RelationManagers\SegnalazioniRelationManager;
use App\Models\Santo;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class SantoResource extends Resource
{
    protected static ?string $model = Santo::class;

    protected static ?string $slug = 'santi';

    protected static ?string $pluralLabel = 'Santi';
    protected static ?string $label = 'Santo';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-face-smile';

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Select::make('fonte_id')
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
                Section::make('Onomastico')
                    ->schema([
                        Toggle::make('onomastico')
                            ->label('Onomastico Primario')
                            ->default(false),
                        Toggle::make('onomastico_secondario')
                            ->default(false),
                    ])
                    ->columns(2)
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('mese')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('giorno')
                    ->sortable()
                    ->searchable(),
                IconColumn::make('onomastico')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('segnalazioni_count')
                    ->label('N. Segnalazioni')
                    ->counts('segnalazioni')
                    ->sortable(),
            ])
            ->filters([
                //
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

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSanti::route('/'),
            'create' => CreateSanto::route('/create'),
            'edit' => EditSanto::route('/{record}/edit'),
        ];
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            SegnalazioniRelationManager::class,
        ];
    }
}
