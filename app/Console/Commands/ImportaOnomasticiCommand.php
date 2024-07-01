<?php

namespace App\Console\Commands;

use App\Models\Fonte;
use App\Models\Santo;
use Exception;
use Illuminate\Console\Command;

class ImportaOnomasticiCommand extends Command
{
    protected $signature = 'importa:onomastici {file}';

    protected $description = 'Importa onomastici da file preso da https://luirig.altervista.org/calendario/onomast.htm';

    public function handle(): void
    {
        $file = $this->argument('file');

        $this->info('Caricamento da '.$file);

        $fonte = Fonte::firstOrCreate([
            'nome' => 'Luigi Rignanese',
            'url' => 'https://luirig.altervista.org/calendario/onomast.htm',
            'note' => 'Sito web Luigì Rignanese',
        ]);

        try {
            $file = fopen($file, "r");

            while (($line = fgets($file)) !== false) {
                $line = rtrim($line, "\r\n");
                $tokens = explode(";", $line);
                $nome = $tokens[0];
                $data = explode(' ',$tokens[1]);
                $giorno = $data[0];
                $mese = self::ottieniNumeroMese($data[1]);

                $santo = Santo::firstOrCreate([
                    'fonte_id' => $fonte->id,
                    'nome' => $nome,
                    'giorno' => $giorno,
                    'mese' => $mese,
                    'onomastico' => true,
                    'onomastico_secondario' => false,
                    ]);
            }
            fclose($file);
        } catch (Exception $e) {
            $this->error('Impossibile aprire il file. Errore: '.$e->getMessage());
        }
    }

    private static function ottieniNumeroMese(string $monthName): ?int
    {
        return match ($monthName) {
            'gennaio' => 1,
            'febbraio' => 2,
            'marzo' => 3,
            'aprile' => 4,
            'maggio' => 5,
            'giugno' => 6,
            'luglio' => 7,
            'agosto' => 8,
            'settembre' => 9,
            'ottobre' => 10,
            'novembre' => 11,
            'dicembre' => 12,
            default => null,
        };
    }
}
