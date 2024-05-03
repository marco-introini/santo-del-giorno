<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SantoResource;
use App\Models\Santo;
use App\Traits\ApiResponse;

class SantoDelGiornoController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return SantoResource::collection(Santo::paginate(10));
    }

    public function show(int $id)
    {
        $santo = Santo::find($id);
        if (is_null($santo)) {
            return $this->error("Santo non trovato");
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

}
