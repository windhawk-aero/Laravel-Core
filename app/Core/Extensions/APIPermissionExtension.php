<?php

namespace App\Core\Extensions;


use Exception;
use App\Core\Constants\Enums\APIRouteEnum;
use App\Models\User;

class APIPermissionExtension extends APIRouteEnum
{
    public static function getPermission($route, $user, $model): bool
    {
        if ($user)  {
            switch ($route) {
                case APIRouteEnum::INDEX:
                    return self::canPermissions($model, $user, $route);
                case APIRouteEnum::SHOW:
                    return self::canPermissions($model, $user, $route);
                case APIRouteEnum::STORE:
                    return self::canPermissions($model, $user, $route);
                case APIRouteEnum::UPDATE:
                    return self::canPermissions($model, $user, $route);
                case APIRouteEnum::DESTROY:
                    return self::canPermissions($model, $user, $route);
                default:
                    throw new Exception('Route Not Found');
            }
        } else {
            return false;
        }
    }

    public static function canPermissions($model, $user, $route): bool
    {
        return $user->can($model . $route);
    }

    function getAPIRouteEnumValue(string $route): ?string
    {
        $routeString = strtolower($route);

        switch ($routeString) {
            case 'index':
                return APIRouteEnum::INDEX;
            case 'show':
                return APIRouteEnum::SHOW;
            case 'store':
                return APIRouteEnum::STORE;
            case 'update':
                return APIRouteEnum::UPDATE;
            case 'destroy':
                return APIRouteEnum::DESTROY;
            default:
                throw new Exception('Route Not Found');
        }
    }
}
