<?php

if (!function_exists('SendResponse')) {

    function SendResponse($status_code,$message,$data = null){
        $response = [
            'status' => $status_code,
            'message' => $message,
        ];
        if($data){
            $response['data'] = $data;
        }
        return response()->json($response,$status_code);
    }
}

