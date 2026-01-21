<?php

namespace App\Filament\Admin\Resources\Fonti;

use App\Filament\Admin\Resources\Fonti\Pages\ManageFonti;
use App\Models\Fonte;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Override;

class FonteResource extends Resource
{
    protected static ?string $model = Fonte::class;

    protected static ?string $slug = 'fonti';

    protected static ?string $pluralLabel = 'Fonti';

    protected static ?string $label = 'Fonte';

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-alt';

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome'),
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
            'index' => ManageFonti::route('/'),
        ];
    }
}
