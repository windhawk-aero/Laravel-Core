<?php
/**
 * Path: app/Helpers/RequestHelper.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail: yusuf.togtay@gmail.com
 * Created At: 26.05.2023
 * Version: 1.0.0
 */

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

/**
 * Request helper
 * This class is used to define request helper.
 * @package App\Helpers
 * @version 1.0.0
 * @since 1.0.0
 */
class RequestHelper extends Request
{
    /**
     * Get meta data
     * This method is used to get the meta data from the request.
     *
     * @param Request $request
     * @return array
     */
    public static function getMetaData(Request $request): array
    {
        return [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'method' => $request->method(),
            'url' => $request->url(),
            'full_url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
        ];
    }

    /**
     * Get bearer token
     * This method is used to get the bearer token from the request.
     *
     * @param Request $request
     * @return string|null
     */
    public static function getBearerToken(Request $request): string|null
    {
        $header = $request->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
        }
        return null;
    }

    /**
     * Get request user
     * This method is used to get the user from the request.
     *
     * @param Request $request
     * @return User|null
     */
    public static function getRequestUser(Request $request): User|null
    {
        $token = self::getBearerToken($request);
        if ($token) {
            $user = User::where('api_token', $token)->first();
            if ($user) {
                return $user;
            }
            return null;
        }
        return null;
    }
}
