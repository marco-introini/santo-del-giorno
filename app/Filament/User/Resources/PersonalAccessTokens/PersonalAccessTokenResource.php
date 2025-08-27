<?php

namespace App\Filament\User\Resources\PersonalAccessTokens;

use BackedEnum;
use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Override;
use App\Filament\User\Resources\PersonalAccessTokens\Pages\ListPersonalAccessTokens;
use App\Filament\User\Resources\PersonalAccessTokens\Pages\CreatePersonalAccessToken;
use App\Filament\User\Resources\PersonalAccessTokens\Pages\ViewPersonalAccessToken;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\PersonalAccessToken;

class PersonalAccessTokenResource extends Resource
{
    protected static ?string $model = PersonalAccessToken::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationLabel = 'API Tokens';

    protected static ?string $modelLabel = 'API Token';

    protected static ?string $pluralModelLabel = 'API Tokens';

    #[Override]
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('tokenable_id', auth()->id())
            ->where('tokenable_type', User::class);
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome Token')
                    ->placeholder('My API Token')
                    ->helperText('Usa un nome descrittivo per una più facile identificazione.'),

                DateTimePicker::make('expires_at')
                    ->label('Fine validità')
                    ->nullable()
                    ->helperText('Lascia vuoto il campo per impostare un token senza scadenza (non consigliato)'),

                CheckboxList::make('abilities')
                    ->options([
                        'view' => 'Vista Santi',
                    ])
                    ->default(['view'])
                    ->columns(2)
                    ->label('Permessi'),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('last_used_at')
                    ->label('Ultimo Utilizzo')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('expires_at')
                    ->label('Data limite')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Data Creazione')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                DeleteAction::make()
                    ->label('Revoca')
                    ->modalHeading('Revoca API Token')
                    ->modalDescription('Sei sicuro di voler revocare questo Token? Le chiamate che lo usano smetteranno di funzionare'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Revoca Selezionati')
                        ->modalHeading('Revoca API Token selezionati')
                        ->modalDescription('Sei sicuro di voler revocare i Token selezionati? Le chiamate che li usano smetteranno di funzionare'),
                ]),
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
            'index' => ListPersonalAccessTokens::route('/'),
            'create' => CreatePersonalAccessToken::route('/create'),
            'view' => ViewPersonalAccessToken::route('/{record}/view'),
        ];
    }
}
