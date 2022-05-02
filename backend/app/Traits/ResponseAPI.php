<?php

namespace App\Traits;

trait ResponseAPI
{
    /**
     * Core of response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode  
     * @param   boolean         $isSuccess
     */
    public function coreResponse($data = null, $statusCode, $isSuccess = true)
    {

        // Send the response
        if($isSuccess) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'status' => $statusCode,
            ], $statusCode);
        } else {
            return response()->json([
                'success' => false,
                'status' => $statusCode,
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     */
    public function successResponse($data, $statusCode = 200)
    {
        return $this->coreResponse($data, $statusCode);
    }

    /**
     * Send any error response
     * 
     * @param   string          $message
     * @param   integer         $statusCode    
     */
    public function errorResponse($statusCode = 500)
    {
        return $this->coreResponse(null, $statusCode, false);
    }
}