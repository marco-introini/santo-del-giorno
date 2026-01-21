<?php

namespace App\Filament\Admin\Resources\Users;

use App\Filament\Admin\Resources\Users\Pages\CreateUser;
use App\Filament\Admin\Resources\Users\Pages\EditUser;
use App\Filament\Admin\Resources\Users\Pages\ListUsers;
use App\Models\User;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Override;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $pluralLabel = 'Utenti';

    protected static ?string $label = 'Utente';

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('api_calls')
                    ->label('Chiamate API')
                    ->disabled(),
                TextInput::make('last_api_call')
                    ->label('Ultima chiamata API')
                    ->formatStateUsing(fn (User $user
                    ) => $user->last_api_call ? $user->last_api_call->format('d/m/Y H:i') : null)
                    ->disabled(),

                Section::make('Informazioni di Sicurezza')
                    ->schema([
                        Placeholder::make('created_at')
                            ->content(fn (User $record): string => $record->created_at->format('d/m/Y H:i'))
                            ->label('Data Iscrizione'),
                        Placeholder::make('email_verified_at')
                            ->content(fn (User $record): string => $record->email_verified_at->format('d/m/Y H:i'))
                            ->label('Data Verifica Email'),
                        Placeholder::make('updated_at')
                            ->content(fn (User $record): string => $record->updated_at->format('d/m/Y H:i'))
                            ->label('Data Ultima Modifica'),
                    ])->columns(),
            ]);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email_verified_at')
                    ->label('Verifica email'),
                TextColumn::make('api_calls')
                    ->sortable()
                    ->label('Chiamate API'),
                TextColumn::make('last_api_call')
                    ->sortable()
                    ->label('Ultima chiamata API')
                    ->date('d/m/Y H:i:s'),
                TextColumn::make('tokens_count')
                    ->counts('tokens')
                    ->sortable()
                    ->label('Numero Token'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    #[Override]
    public static function canCreate(): bool
    {
        return false;
    }
}
