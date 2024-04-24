<?php

namespace App\Http\Controllers;

use App\Http\Resources\SantoResource;
use App\Models\Santo;
use Illuminate\Http\Request;

class SantoController extends Controller
{
    public function index()
    {
        return SantoResource::collection(Santo::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => ['required'],
            'data' => ['required', 'date'],
            'note' => ['nullable'],
        ]);

        return new SantoResource(Santo::create($data));
    }

    public function show(Santo $santo)
    {
        return new SantoResource($santo);
    }

    public function update(Request $request, Santo $santo)
    {
        $data = $request->validate([
            'nome' => ['required'],
            'data' => ['required', 'date'],
            'note' => ['nullable'],
        ]);

        $santo->update($data);

        return new SantoResource($santo);
    }

    public function destroy(Santo $santo)
    {
        $santo->delete();

        return response()->json();
    }
}
