<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SantoResource;
use App\Models\Santo;
use Illuminate\Http\Request;

class SantoDelGiornoController extends Controller
{
    public function index()
    {
        return SantoResource::collection(Santo::paginate(10));
    }

    public function show(Santo $santo): SantoResource
    {
        return new SantoResource($santo);
    }

    public function findByDate(int $mese, int $giorno)
    {

    }

    public function findByName(string $nome)
    {

    }

}
