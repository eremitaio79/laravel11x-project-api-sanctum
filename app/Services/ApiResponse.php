<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     *  Sucesso.
     *  */
    public static function success($data, $code = 200) : JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => 'Success All Right!!',
        ], $code);
    }

    /**
     * Erro.
     */
    public static function error($message = null, $code = 500) : JsonResponse
    {
        return response()->json([
            // 'data' => $data,
            'message' => $message,
        ], $code);
    }

    /**
     * Unauthorized.
     */
    public static function unauthorized($code = 500) : JsonResponse
    {
        return response()->json([
            // 'data' => $data,
            'message' => 'Unauthorized access!',
        ], $code);
    }
}
