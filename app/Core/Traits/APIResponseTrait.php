<?php

namespace App\Core\Traits;

trait APIResponseTrait
{
    protected function makeResponse($message, $result)
    {
        return [
            'success' => true,
            'message' => $message,
            'data' => $result,
            'meta' => [],
        ];
    }
    protected function makeError($error)
    {
        return [
            'success' => false,
            'message' => $error,
            'data' => [],
            'meta' => [],
        ];
    }
}
