<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SantoResource;
use App\Models\Santo;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

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

    }

    public function findByName(string $nome)
    {

    }

}
