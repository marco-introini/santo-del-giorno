<?php

namespace App\Livewire;

use App\Models\Santo;
use Livewire\Component;

class CercaSantoPerData extends Component
{
    public int $giorno;
    public int $mese;

    public function __construct()
    {
        $this->giorno = now()->day;
        $this->mese = now()->month;
    }

    public function render()
    {
        return view('livewire.cerca-santo-per-data',[
            'santi' => Santo::where('giorno',$this->giorno)->where('mese',$this->mese)->get(),
        ]);
    }
}
