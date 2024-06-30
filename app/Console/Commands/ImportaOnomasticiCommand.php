<?php

namespace App\Console\Commands;

use App\Models\Fonte;
use Exception;
use Illuminate\Console\Command;

class ImportaOnomasticiCommand extends Command
{
    protected $signature = 'importa:onomastici';

    protected $description = 'Importa onomastici da file preso da https://luirig.altervista.org/calendario/onomast.htm';

    public function handle(): void
    {
        $file = $this->argument('file');

        $this->info('Caricamento da '.$file);

        $fonte = Fonte::firstOrCreate([
            'nome' => 'Cathopedia',
            'url' => 'https://luirig.altervista.org/calendario/onomast.htm',
            'note' => 'Wikipedia Cattolica'
        ]);

        try {
            $file = fopen($file, "r");

            $giornoAttuale = 0;
            $meseAttuale = 0;
            while (($line = fgets($file)) !== false) {
                $line = rtrim($line, "\r\n");
                fclose($file);
            }
        } catch (Exception $e) {
            $this->error('Impossibile aprire il file. Errore: '.$e->getMessage());
        }
    }
}
