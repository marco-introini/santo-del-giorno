<?php

namespace App\Filament\User\Resources;

use App\Enums\TipoSegnalazione;
use App\Filament\User\Resources\SegnalazioneResource\Pages;
use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Forms\Form;
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


    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    #[\Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santo_id')
                    ->relationship('santo', 'nome')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('tipo_segnalazione')
                    ->options(TipoSegnalazione::class)
                    ->required(),
                Forms\Components\Textarea::make('testo_segnalazione')
                    ->columnSpanFull()
                    ->rows(10)
                    ->required(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('tipo_segnalazione')
                    ->label('Tipo'),
                Tables\Columns\IconColumn::make('evasa')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data Inserimento')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('testo_segnalazione')
                    ->limit(50)
                    ->searchable(),
            ])
            ->defaultSort('created_at','DESC')
            ->filters([
                Tables\Filters\TernaryFilter::make('evasa'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id','=', Auth::id()));
    }

    #[\Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    #[\Override]
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSegnalazioni::route('/'),
            'create' => Pages\CreateSegnalazione::route('/create'),
            'edit' => Pages\EditSegnalazione::route('/{record}/edit'),
            'view'  => Pages\ViewSegnalazione::route('/{record}/view'),
        ];
    }

    /** @param  Segnalazione  $record */
    #[\Override]
    public static function canDelete(Model $record): bool
    {
        // posso cancellarla solo se non è già evasa
        return !$record->evasa;
    }

    /** @param  Segnalazione  $record */
    #[\Override]
    public static function canEdit(Model $record): bool
    {
        // posso modificarla solo se non è già evasa
        return !$record->evasa;
    }
}
