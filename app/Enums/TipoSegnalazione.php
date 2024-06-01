<?php

namespace App\Enums;

enum TipoSegnalazione: string
{
    case DATA_ERRATA = 'DATA_ERRATA';
    case NOME_ERRATO = 'NOME_ERRATO';
    case ONOMASTICO_ERRATO = 'ONOMASTICO_ERRATO';
}
