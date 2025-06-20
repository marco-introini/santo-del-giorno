<?php

namespace App\Http\Resources;

use App\Models\Santo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Santo */
class SantoResource extends JsonResource
{
    #[\Override]
    public function withResponse(Request $request, JsonResponse $response): void
    {
        $response->header('treblle-user-id', auth()->user()->email ?? 'guest');
    }

    #[\Override]
    public function toArray(Request $request): array
    {
        return [
            'type' => 'santo',
            'uuid' => $this->id,
            'attributes' => [
                'nome' => $this->nome,
                'giorno' => $this->giorno,
                'mese' => $this->mese,
                'onomastico' => $this->onomastico,
                'onomasticoSecondario' => $this->onomastico_secondario,
                'note' => $this->when(
                    $request->routeIs('santo.show'),
                    $this->note,
                )
            ],
            'relationships' => [
                'fonte' => [
                    'data' => [
                        'type' => 'fonte',
                        'id' => $this->fonte_id,
                    ],
                    'links' => [
                        'self' => route('fonte.show', $this->fonte_id),
                    ]
                ]
            ],
            'includes' => new FonteResource($this->whenLoaded('fonte')),
            'links' => [
                'self' => route('santo.show', $this),
            ]
        ];
    }
}
