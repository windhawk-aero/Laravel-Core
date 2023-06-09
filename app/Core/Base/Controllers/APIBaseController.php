<?php
/**
 * Path: app/Core/Base/Controllers/APIBaseController.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 25.05.2023
 */
namespace App\Core\Base\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Barryvdh\Debugbar\Controllers\BaseController;
use App\Core\Interfaces\Controllers\APIControllerInterface;

/**
 * Class APIBaseController
 * @package App\Core\Base\Controllers
 */
abstract class APIBaseController extends BaseController implements APIControllerInterface
{
    /**
     * Make response
     *
     * @param mixed $message
     * @param mixed $result
     * @return void
     */
    abstract protected function makeResponse($message, $result);

    /**
     * Make error
     *
     * @param mixed $error
     * @return void
     */
    abstract protected function makeError($error);

    /**
     * Send response
     * This method is used to send response.
     *
     * @param JsonResource $result
     * @param string $message
     * @return JsonResponse
     */
    public function sendResponse(JsonResource $result, string $message): JsonResponse
    {
        return response()->json($this->makeResponse($message, $result));
    }

    /**
     * Send error
     * This method is used to send error.
     *
     * @param JsonResource $message
     * @param integer $code
     * @return JsonResponse
     */
    public function sendError(JsonResource $message, $code = 404): JsonResponse
    {
        return response()->json($this->makeError($message), $code);
    }
}
