<?php

namespace App\Console\Commands;

use App\Models\Fonte;
use App\Models\Santo;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;

class ImportaFileCathopediaCommand extends Command
{
    protected $signature = 'importa:file-cathopedia {file}';

    protected $description = 'Carica i dati da un file del formato DATA\nNome,Descrizione';

    public function handle(): void
    {
        $file = $this->argument('file');

        $this->info('Caricamento da '.$file);

        $fonte = Fonte::firstOrCreate([
            'nome' => 'Cathopedia',
            'url' => 'https://it.cathopedia.org/wiki/Cathopedia:Pagina_principale',
            'note' => 'Wikipedia Cattolica',
        ]);

        try {
            $file = fopen($file, 'r');

            $giornoAttuale = 0;
            $meseAttuale = 0;
            while (($line = fgets($file)) !== false) {
                $line = rtrim($line, "\r\n");
                if (ctype_digit(substr($line, 0, 1))) {
                    $dataTime = self::convertiDataItalianoInDateTime($line);
                    if ($dataTime) {
                        $giornoAttuale = $dataTime->day;
                        $meseAttuale = $dataTime->month;
                    } else {
                        $this->error('Non è possibile trasformare la data '.$line);
                    }
                } else {

                    $parti = str($line)
                        ->remove(';')
                        ->explode(',');
                    $nome = $parti[0];
                    $descrizione = $parti->slice(1)->join(', ');
                    Santo::create([
                        'nome' => $nome,
                        'note' => $descrizione,
                        'fonte_id' => $fonte->id,
                        'giorno' => $giornoAttuale,
                        'mese' => $meseAttuale,
                    ]);

                }
            }
            fclose($file);
        } catch (Exception $e) {
            $this->error('Impossibile aprire il file. Errore: '.$e->getMessage());
        }

    }

    public static function convertiDataItalianoInDateTime($dataItaliano): ?Carbon
    {
        $mesiItalianoInglese = [
            'gennaio' => 'January',
            'febbraio' => 'February',
            'marzo' => 'March',
            'aprile' => 'April',
            'maggio' => 'May',
            'giugno' => 'June',
            'luglio' => 'July',
            'agosto' => 'August',
            'settembre' => 'September',
            'ottobre' => 'October',
            'novembre' => 'November',
            'dicembre' => 'December',
        ];

        $partiData = explode(' ', (string) $dataItaliano);

        if (count($partiData) == 2) {
            if (array_key_exists($partiData[1], $mesiItalianoInglese)) {
                $partiData[1] = $mesiItalianoInglese[$partiData[1]];
                $dataInglese = implode(' ', $partiData);

                return Carbon::createFromFormat('j F', $dataInglese);
            }
        }

        return null;
    }
}
