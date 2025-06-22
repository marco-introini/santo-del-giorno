<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\PersonalAccessTokenResource\Pages;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\PersonalAccessToken;

class PersonalAccessTokenResource extends Resource
{
    protected static ?string $model = PersonalAccessToken::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationLabel = 'API Tokens';

    protected static ?string $modelLabel = 'API Token';

    protected static ?string $pluralModelLabel = 'API Tokens';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('tokenable_id', auth()->id())
            ->where('tokenable_type', 'App\\Models\\User');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome Token')
                    ->placeholder('My API Token')
                    ->helperText('Usa un nome descrittivo per una più facile identificazione.'),

                Forms\Components\DateTimePicker::make('expires_at')
                    ->label('Fine validità')
                    ->nullable()
                    ->helperText('Lascia vuoto il campo per impostare un token senza scadenza (non consigliato)'),

                Forms\Components\CheckboxList::make('abilities')
                    ->options([
                        'view' => 'Vista Santi',
                    ])
                    ->default(['view'])
                    ->columns(2)
                    ->label('Permessi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('last_used_at')
                    ->label('Ultimo Utilizzo')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label('Data limite')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data Creazione')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Revoca')
                    ->modalHeading('Revoca API Token')
                    ->modalDescription('Sei sicuro di voler revocare questo Token? Le chiamate che lo usano smetteranno di funzionare'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Revoca Selezionati')
                        ->modalHeading('Revoca API Token selezionati')
                        ->modalDescription('Sei sicuro di voler revocare i Token selezionati? Le chiamate che li usano smetteranno di funzionare'),
                ]),
            ]);
    }

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
            'index' => Pages\ListPersonalAccessTokens::route('/'),
            'create' => Pages\CreatePersonalAccessToken::route('/create'),
            'view' => Pages\ViewPersonalAccessToken::route('/{record}/view'),
        ];
    }
}
