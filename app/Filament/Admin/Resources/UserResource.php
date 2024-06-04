<?php

namespace App\Filament\Admin\Resources;


use App\Models\User;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $pluralLabel = "Utenti";
    protected static ?string $label = "Utente";

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
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Verifica email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => \App\Filament\Admin\Resources\SantoResource\Pages\ListSanti::route('/'),
            'create' => \App\Filament\Admin\Resources\SantoResource\Pages\CreateSanto::route('/create'),
            'edit' => \App\Filament\Admin\Resources\SantoResource\Pages\EditSanto::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

}
