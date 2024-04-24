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

    public function show(Santo $santo)
    {
        return new SantoResource($santo);
    }

}
