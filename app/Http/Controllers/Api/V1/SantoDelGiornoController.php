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

    public function show(Santo $santo)
    {
        return $this->ok("Santo Trovato", new SantoResource($santo));
    }

    public function findByDate(int $mese, int $giorno)
    {
        $santi = Santo::where('mese', $mese)->where('giorno', $giorno)->get();
        return $this->ok("Santo Trovato", SantoResource::collection($santi));
    }

    public function findByName(string $nome)
    {

    }

}
