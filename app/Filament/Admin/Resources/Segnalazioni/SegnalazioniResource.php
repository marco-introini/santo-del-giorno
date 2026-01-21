<?php

namespace App\Filament\Admin\Resources\Segnalazioni;

use App\Enums\TipoSegnalazione;
use App\Filament\Admin\Resources\Segnalazioni\Pages\CreateSegnalazione;
use App\Filament\Admin\Resources\Segnalazioni\Pages\EditSegnalazione;
use App\Filament\Admin\Resources\Segnalazioni\Pages\ListSegnalazioni;
use App\Models\Segnalazione;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Override;

class SegnalazioniResource extends Resource
{
    protected static ?string $model = Segnalazione::class;

    protected static ?string $pluralLabel = 'Segnalazioni';

    protected static ?string $label = 'Segnalazione';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bell-alert';

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->disabled(),
                Select::make('santo_id')
                    ->relationship('santo', 'nome'),
                Select::make('tipo_segnalazione')
                    ->options(TipoSegnalazione::class)
                    ->disabled(),
                Textarea::make('testo_segnalazione')
                    ->columnSpanFull()
                    ->rows(10),
                Textarea::make('note_chiusura')
                    ->columnSpanFull()
                    ->visible(fn (Segnalazione $record) => $record->evasa)
                    ->rows(10),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('tipo_segnalazione')
                    ->label('Tipo'),
                IconColumn::make('evasa')
                    ->boolean(),
                TextColumn::make('user.name')
                    ->label('Segnalatore')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Data')
                    ->sortable()
                    ->searchable()
                    ->date('d/m/Y H:i'),
                TextColumn::make('testo_segnalazione')
                    ->limit(50)
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'DESC')
            ->filters([
                TernaryFilter::make('evasa')
                    ->default(false),
                SelectFilter::make('user')
                    ->relationship('user', 'name'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
            ]);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSegnalazioni::route('/'),
            'create' => CreateSegnalazione::route('/create'),
            'edit' => EditSegnalazione::route('/{record}/edit'),
        ];
    }
}
