<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    /**
     *  Sucesso.
     *
     * @param mixed $data
     * @param int $code
     * @return JsonResponse
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
     *
     * @param mixed $message
     * @param int $code
     * @return JsonResponse
     */
    public static function error($message = null, $code = 500) : JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    /**
     * Unauthorized.
     *
     * @param int $code
     * @return JsonResponse
     */
    public static function unauthorized($code = 401) : JsonResponse
    {
        return response()->json([
            'message' => 'Unauthorized access!',
        ], $code);
    }
}
