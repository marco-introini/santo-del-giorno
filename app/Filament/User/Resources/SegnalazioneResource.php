<?php

namespace App\Filament\User\Resources;

use Override;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Actions\EditAction;
use App\Filament\User\Resources\SegnalazioneResource\Pages\ListSegnalazioni;
use App\Filament\User\Resources\SegnalazioneResource\Pages\CreateSegnalazione;
use App\Filament\User\Resources\SegnalazioneResource\Pages\EditSegnalazione;
use App\Filament\User\Resources\SegnalazioneResource\Pages\ViewSegnalazione;
use App\Enums\TipoSegnalazione;
use App\Filament\User\Resources\SegnalazioneResource\Pages;
use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SegnalazioneResource extends Resource
{
    protected static ?string $model = Segnalazione::class;
    protected static ?string $label = "Segnalazione";
    protected static ?string $pluralLabel = "Segnalazioni";

    protected static ?string $slug = "segnalazioni";


    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bell-alert';

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('santo_id')
                    ->relationship('santo', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('tipo_segnalazione')
                    ->options(TipoSegnalazione::class)
                    ->required(),
                Textarea::make('testo_segnalazione')
                    ->columnSpanFull()
                    ->rows(10)
                    ->required(),
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
                TextColumn::make('created_at')
                    ->label('Data Inserimento')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('testo_segnalazione')
                    ->limit(50)
                    ->searchable(),
            ])
            ->defaultSort('created_at','DESC')
            ->filters([
                TernaryFilter::make('evasa'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id','=', Auth::id()));
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
            'view'  => ViewSegnalazione::route('/{record}/view'),
        ];
    }

    /** @param  Segnalazione  $record */
    #[Override]
    public static function canDelete(Model $record): bool
    {
        // posso cancellarla solo se non è già evasa
        return !$record->evasa;
    }

    /** @param  Segnalazione  $record */
    #[Override]
    public static function canEdit(Model $record): bool
    {
        // posso modificarla solo se non è già evasa
        return !$record->evasa;
    }
}
