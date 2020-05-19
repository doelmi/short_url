<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function buildResponse($status, $code = 200, $message, $resultdata = null)
    {
        $response = [
            'status' => $status ? 'success' : 'failed',
            'code' => $code,
            'message' => $message,
            'response_time' => Carbon::createFromTimestamp(time()),
            'result_data' => $resultdata
        ];
        return response()->json($response, $code, ['Content-Type' => 'application/json']);
    }
}
