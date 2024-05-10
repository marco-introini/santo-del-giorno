<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;


class ImportaFileCarthopediaCommand extends Command
{
    protected $signature = 'importa:file-carthopedia {file}';

    protected $description = 'Carica i dati da un file del formato DATA\nNome,Descrizione';

    public function handle(): void
    {
        $file = $this->argument('file');

        $this->info('Caricamento da '.$file);

        try {
            $file = fopen("percorso/al/tuo/file.txt", "r");

            while (($line = fgets($file)) !== false) {
                //TODO
            }
            fclose($file);
        }
        catch (Exception $e) {
            $this->error('Impossibile aprire il file. Errore: '.$e->getMessage());
        }

    }
}
