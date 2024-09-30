<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait apiResponseTrait
{
    /**
     * Respond with a success message.
     *
     * @param string $message
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    public function successResponse(string $message, $data = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Respond with an error message.
     *
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse(string $message,$data = null , int $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
