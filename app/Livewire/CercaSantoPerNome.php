<?php

namespace App\Livewire;

use App\Models\Santo;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CercaSantoPerNome extends Component
{
    use WithPagination;

    public string $nome = '';
    public bool $onomastico = false;

    public function render()
    {
        $query = Santo::where('nome', 'like', '%'.$this->nome.'%');

        if ($this->onomastico) {
            $query->where(function (Builder $builder) {
                $builder->where('onomastico', true)
                    ->orWhere('onomastico_secondario', true);
            });
        }

        return view('livewire.cerca-santo-per-nome',[
            'santi' => $query->paginate(20)
            ]);
    }

    public function cercaPerNome(): void
    {
        $this->resetPage();
        $this->render();
    }

}
