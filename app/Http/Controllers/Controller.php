<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse(int $statusCode, string $message, $data=null)
    {
        if(!is_null($data)){

            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $data
            ], $statusCode);
        }

        return response()->json([
            'status' => true,
            'message' => $message,
        ], $statusCode);
    }

    public function errorResponse(int $statusCode, string $message)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
        ], $statusCode);
    }
}
