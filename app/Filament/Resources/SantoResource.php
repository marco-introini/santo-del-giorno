<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SantoResource\Pages;
use App\Filament\Resources\SantoResource\RelationManagers;
use App\Models\Santo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SantoResource extends Resource
{
    protected static ?string $model = Santo::class;

    protected static ?string $slug = 'santi';

    protected static ?string $pluralLabel = 'Santi';
    protected static ?string $label = 'Santo';

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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSanti::route('/'),
        ];
    }
}
