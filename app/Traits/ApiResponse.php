<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    public function baseResponse(string $message, $data, int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    public function ok(string $message, $data = [], int $code = 200): JsonResponse
    {
        return $this->baseResponse($message, $data, $code)
            ->withHeaders([
                'treblle-user-id' => auth()->user()->email ?? 'guest',
            ]);
    }

    public function error(string $message, int $code = 500): JsonResponse
    {
        return $this->baseResponse($message, [], $code)
            ->withHeaders([
                'treblle-user-id' => auth()->user()->email ?? 'guest',
            ]);
    }

}
