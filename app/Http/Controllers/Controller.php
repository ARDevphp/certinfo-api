<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function response($data, $code = null): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ], $code);
    }

    public function success(string $message = null, $data = null, $code = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => 'success',
            'message' => $message ?? 'operation successfull',
            'data' => $data,
        ], $code ?? 200);
    }

    public function error(string $message, $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status' => 'error',
            'message' => $message ?? 'error occured',
            'data' => $data,
        ], 400);
    }
}
