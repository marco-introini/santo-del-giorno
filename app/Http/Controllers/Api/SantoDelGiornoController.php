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
        return SantoResource::paginate(20);
    }

    public function show($id)
    {
        return SantoResource::whereId($id);
    }

}
