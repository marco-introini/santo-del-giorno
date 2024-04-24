<?php

namespace App\Http\Resources;

use App\Models\Santo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Santo */
class SantoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'giorno' => $this->giorno,
            'mese' => $this->mese,
            'note' => $this->note,
        ];
    }
}
