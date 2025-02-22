<?php

namespace App\Filament\Admin\Resources;


use App\Models\User;
use Faker\Provider\Text;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
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
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('api_calls')
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


    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Admin\Resources\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Admin\Resources\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Admin\Resources\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

}
