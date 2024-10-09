<?php

namespace App\Http\Controllers;



use App\ResponseUtilTrait;
use Illuminate\Http\Client\Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{

    Use ResponseUtilTrait;

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    public static function makeResponse($message, $data)
    {
        return [
            'success' => true,
//            'rows'    => count($data),
            'data'    => $data,
            'message' => $message,
        ];
    }

    public function sendResponse($result, $message)
    {

        return Response::json($this->makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json($this->makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
}
