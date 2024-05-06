<?php

namespace App\Http\Resources;

use App\Models\Fonte;
use App\Models\Santo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Fonte */
class FonteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'type' => 'fonte',
            'id' => $this->id,
            'attributes' => [
                'nome' => $this->nome,
                'url' => $this->url,
                'note' => $this->note,
                'numeroSanti' => $this->santi()->count(),
            ],
        ];
    }
}
