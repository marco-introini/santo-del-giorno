<?php

namespace App\Livewire;

use App\Models\Santo;
use Livewire\Component;
use Livewire\WithPagination;

class CercaSantoPerNome extends Component
{
    use WithPagination;

    public string $nome = '';

    public function render()
    {
        return view('livewire.cerca-santo-per-nome',[
            'santi' => Santo::where('nome', 'like', '%'.$this->nome.'%')->paginate(20)
            ]);
    }
}
