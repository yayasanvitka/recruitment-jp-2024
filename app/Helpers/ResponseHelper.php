<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

enum statusCode  {
    const OK = 200;
    const CREATED = 201;
    const UNAUTHORIZED = 401;
    const INTERNAL_SERVER_ERROR = 500;
}

class ResponseHelper
{
    public static function returnOkResponse($message, $data) {
        $response = [
            'message' => $message,
            'data' => $data 
        ];

        return response()->json($response, statusCode::OK);
    }

    public static function returnCreatedResponse($message, $data) {
        $response = [
            'message' => $message,
            'data' => $data 
        ];

        return response()->json($response, statusCode::CREATED);
    }

    public static function throwUnauthorizedError($message) {
        $response = [
            'message' => $message
        ];

        return response()->json($response, statusCode::UNAUTHORIZED);
    }

    public static function throwInternalError($error) {
        $response = [
            'message' => 'Internal Server Error, please try again later',
        ];

        if(config('app.env') === 'local') {
            $response['error'] = $error->getMessage();
            $response['trace'] = $error->getTraceAsString();
        } else {
            Log::error($error);
        }
    
        return response()->json($response, statusCode::INTERNAL_SERVER_ERROR);
    }
}