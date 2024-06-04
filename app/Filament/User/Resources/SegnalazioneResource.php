<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\SegnalazioneResource\Pages;
use App\Filament\User\Resources\SegnalazioneResource\RelationManagers;
use App\Models\Segnalazione;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SegnalazioneResource extends Resource
{
    protected static ?string $model = Segnalazione::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSegnalaziones::route('/'),
            'create' => Pages\CreateSegnalazione::route('/create'),
            'edit' => Pages\EditSegnalazione::route('/{record}/edit'),
        ];
    }
}
