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
            'type' => 'santo',
            'uuid' => $this->id,
            'attributes' => [
                'nome' => $this->nome,
                'giorno' => $this->giorno,
                'mese' => $this->mese,
                'note' => $this->when(
                    $request->routeIs('santo.show'),
                    $this->note,
                )
            ],
            'links' => [
                'self' => route('santo.show', $this),
            ]
        ];
    }
}
