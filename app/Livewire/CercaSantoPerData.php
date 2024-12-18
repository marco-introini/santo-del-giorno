<?php

namespace App\Livewire;

use App\Models\Santo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CercaSantoPerData extends Component
{
    public int $giorno;
    public int $mese;

    public Collection $onomasticiPrimari;
    public Collection $onomasticiSecondari;

    public function __construct()
    {
        $this->giorno = now()->day;
        $this->mese = now()->month;
    }

    public function render()
    {
        $this->onomasticiPrimari = Santo::where('giorno',$this->giorno)
            ->where('mese',$this->mese)
            ->where('onomastico', true)
            ->get();
        $this->onomasticiSecondari = Santo::where('giorno',$this->giorno)
            ->where('mese',$this->mese)
            ->where('onomastico_secondario', true)
            ->get();

        return view('livewire.cerca-santo-per-data',[
            'santi' => Santo::where('giorno',$this->giorno)->where('mese',$this->mese)->get(),
        ]);
    }
}
