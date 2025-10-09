<?php

namespace App\Filament\Admin\Resources\Segnalazioni\Pages;

use App\Models\Segnalazione;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use App\Filament\Admin\Resources\Segnalazioni\SegnalazioniResource;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\EditRecord;

class EditSegnalazione extends EditRecord
{
    protected static string $resource = SegnalazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            Action::make('evadi')
                ->schema([
                    Textarea::make('note_chiusura')
                        ->required()
                        ->columnSpanFull()
                ])
                ->action(function (array $data, Segnalazione $record): void {
                    $record->evasa = true;
                    $record->note_chiusura = $data['note_chiusura'];
                })
        ];
    }
}
