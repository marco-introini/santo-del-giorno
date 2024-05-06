<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Resources\FonteResource;
use App\Models\Fonte;
use App\Traits\ApiResponse;

class FonteController extends ApiController
{
    use ApiResponse;

    public function show(Fonte $fonte): FonteResource
    {
        return new FonteResource($fonte->load('santi'));
    }
}
