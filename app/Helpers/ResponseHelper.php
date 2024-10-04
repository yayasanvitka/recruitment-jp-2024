<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

enum StatusCode
{
    const OK = 200;
    const CREATED = 201;
    const INTERNAL_SERVER_ERROR = 500;
}

Class ResponseHelper {    

    public static function returnOkResponse($message, $data) 
    {
        $response = [
            'message' => $message,
            'data' => $data
        ];

        if(is_array($data)) {
            $response['count'] = count($data);
        }
        
        return response()->json($response, StatusCode::OK);   
    }

    public static function returnCreatedResponse($message,$data)
    {
        $response = [
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, StatusCode::CREATED);
    }

    public static function throwInternalError($error = null)
    {
        $response = [
            'message' => "Internal Server Error, please try again later",  
        ];
        
        $isLocalEnv = env('APP_ENV') === 'local';
        
        if($isLocalEnv) {
            $response['error'] = $error->getMessage();
            $response['stack'] = $error->getTraceAsString();
        } else {
            Log::error($error->getMessage());
        }

        return response()->json($response, StatusCode::INTERNAL_SERVER_ERROR);
    }
}