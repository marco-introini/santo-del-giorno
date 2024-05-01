<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    public function baseResponse(string $message, $data,  int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ]);
    }

    public function ok(string $message, $data = [],  int $code = 200): JsonResponse
    {
        return $this->baseResponse($message, $data, $code);
    }

    public function error(string $message,  int $code = 500): JsonResponse
    {
        return $this->baseResponse($message, [], $code);
    }

}
