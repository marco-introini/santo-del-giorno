<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportaFileCarthopediaCommand extends Command
{
    protected $signature = 'importa:file-carthopedia';

    protected $description = 'Carica i dati da un file del formato DATA\nNome,Descrizione';

    public function handle(): void
    {

    }
}
