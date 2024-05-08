<?php

namespace App\Livewire;

use Livewire\Component;

class CercaSantoPerNome extends Component
{
    public string $nome;

    public function render()
    {
        return view('livewire.cerca-santo-per-nome');
    }
}
