<?php

namespace App\Filament\Admin\Resources;

use App\Models\Fonte;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FonteResource extends Resource
{
    protected static ?string $model = Fonte::class;

    protected static ?string $slug = 'fonti';

    protected static ?string $pluralLabel = 'Fonti';
    protected static ?string $label = 'Fonte';

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    #[\Override]
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                TextInput::make('url')
                    ->required()
                    ->maxLength(255)
                    ->url(),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }

    #[\Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),
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
            'index' => \App\Filament\Admin\Resources\FonteResource\Pages\ManageFonti::route('/'),
        ];
    }
}
