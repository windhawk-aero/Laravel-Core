<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\RedisHelper;
use Illuminate\Http\Request;
use App\Helpers\RequestHelper;
use MessagePack\Type\Timestamp;
use Illuminate\Support\Facades\Redis;

class APIStatisticsMiddleware
{
    /**
     * Handle an incoming request.
     * This middleware is used to store API statistics in Redis.
     * It stores the request metadata in api_statistics_header and the model data in api_statistics.
     * The model data is stored in a hash table with the key api_statistics and the value is a MessagePack encoded array.
     * The request metadata is stored in a hash table with the key api_statistics_header and the value is a MessagePack encoded array.
     *
     * @param Request $request
     * @param Closure $next
     * @return void
     */
    public function handle(Request $request, Closure $next)
    {
        $model = $request->route()->parameters();
        foreach ($model as $key => $value) {
            $model = app('App\Models\\' . ucfirst($key))->find($value);
            break;
        }
        if (empty($model)) {
            return $next($request);
        }

        $currentCount = RedisHelper::getCounter('api_counter');

        if (RedisHelper::storeMessagePackData('api_statistics', $currentCount, $this->getStatsData($model))) {
            RedisHelper::storeMessagePackData('api_statistics_header', $currentCount, RequestHelper::getMetaData($request));
            $currentCount = RedisHelper::setCountIncrement('api_counter');
        }

        return $next($request);
    }

    /**
     * Get the statistics data
     * This method is used to get the statistics data from the model.
     *
     * @param Eloquent $model
     * @return array
     */
    private static function getStatsData($model): array
    {
        return [
            'model_id' => $model->id,
            'model_class' => get_class($model),
            'created_at' => Timestamp::now(),
        ];
    }
}
