<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Resources\SantoResource;
use App\Models\Santo;
use App\Traits\ApiResponse;
use Illuminate\Database\Query\Builder;

class SantoDelGiornoController extends ApiController
{
    use ApiResponse;

    public function index()
    {
        return SantoResource::collection(Santo::paginate(10));
    }

    public function show(string $uuid)
    {
        $santo = Santo::without('fonte')->find($uuid);
        if (is_null($santo)) {
            return $this->error("Santo non trovato");
        }
        if ($this->include('fonte')) {
            return $this->ok("Santo Trovato (richiesta Fonte)", new SantoResource($santo->load('fonte')));
        }

        return $this->ok("Santo Trovato", new SantoResource($santo));
    }

    public function findByDate(int $mese, int $giorno)
    {
        $santi = Santo::where('mese', $mese)->where('giorno', $giorno)->get();
        return $this->ok("Santi del $giorno/$mese", SantoResource::collection($santi));
    }

    public function findByName(string $nome)
    {
        $santi = Santo::where('nome', 'LIKE', '%'.$nome.'%')->get();
        return $this->ok("Santi contenente '$nome'", SantoResource::collection($santi));

    }

    public function findOnomastico(string $nome)
    {
        $santi = Santo::where('nome', 'LIKE', '%'.$nome.'%')
            ->where(function (Builder $builder){
                $builder->where('onomastico',true)->orWhere('onomastico_secondario', true);
            })->get();
        return $this->ok("Onomastico di '$nome'", SantoResource::collection($santi));
    }

}
