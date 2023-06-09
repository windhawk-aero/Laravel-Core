<?php

/**
 * Path: app/Core/Base/Observers/BaseObserver.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 22.05.2023
 */

namespace App\Core\Base\Observers;

use Illuminate\Http\Response;
use App\Core\Interfaces\Observers\ObserverInterface;
use Illuminate\Http\JsonResponse;

/**
 * Class BaseObserver
 * @package App\Core\Base\Observers
 * @property User::class $user
 */
abstract class BaseObserver implements ObserverInterface
{
    /**
     * Make an error based on the provided error message.
     *
     * This method is intended to be implemented by child classes to handle error creation
     * based on a given error message. It accepts an error message as a parameter and
     * should return the constructed error object.
     *
     * @param string $error The error message to use for creating the error.
     * @return Error The constructed error object.
     */
    abstract protected function makeError($error);

    /**
     * Make a response based on the provided message and result.
     * This method is intended to be implemented by child classes to handle response creation
     * based on a given message and result. It accepts a message and result as parameters and
     * should return the constructed response object.
     *
     * @param string $model
     * @return string
     */
    protected function getClassName($model): string
    {
        return (new \ReflectionClass($model))->getShortName();
    }

    /**
     * Send response
     * This method is used to send response.
     *
     * @param mixed $error
     * @param int $code
     * @return JsonResponse
     */
    public function sendError($error, $code): JsonResponse
    {
        return response()->json($this->makeError($error), $code);
    }
}
