<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;

enum TipoSegnalazione: string implements  HasIcon
{
    case DATA_ERRATA = 'DATA_ERRATA';
    case NOME_ERRATO = 'NOME_ERRATO';
    case ONOMASTICO_ERRATO = 'ONOMASTICO_ERRATO';


    public function getIcon(): string
    {
        return match ($this) {
            self::DATA_ERRATA => 'heroicon-o-calendar',
            self::NOME_ERRATO => 'heroicon-o-user',
            self::ONOMASTICO_ERRATO => 'heroicon-o-user-group',
        };
    }
}
