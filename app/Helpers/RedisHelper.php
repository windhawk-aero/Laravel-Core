<?php
/**
 * Path: app/Helpers/RedisHelper.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail: yusuf.togtay@gmail.com
 * Created At: 26.05.2023
 * Version: 1.0.0
 */

namespace App\Helpers;

use MessagePack\MessagePack;
use Illuminate\Support\Facades\Redis;
use Illuminate\Redis\Connections\Connection;

/**
 * Redis helper
 * This class is used to define redis helper.
 * @package App\Helpers
 * @version 1.0.0
 * @since 1.0.0
 */
class RedisHelper extends Redis
{
    /**
     * Get the redis connection
     * This method is used to get the redis connection.
     *
     * @return Connection
     */
    public static function getRedisConnection(): Connection
    {
        return self::connection();
    }

    /**
     * Store json data to redis
     * This method is used to store json data to redis.
     *
     * @param string $hashName
     * @param string $key
     * @param array $value
     * @return boolean
     */
    public static function storeJsonData(string $hashName, string $key, array|string $value): bool
    {
        return self::hset($hashName, $key, json_encode($value));
    }

    /**
     * Store message pack data to redis
     * This method is used to store message pack data to redis.
     *
     * @param string $hashName
     * @param string|int $key
     * @param array|string $value
     * @return boolean
     */
    public static function storeMessagePackData(string $hashName, string|int $key, array|string $value): bool
    {
        return self::hset($hashName, $key, MessagePack::pack($value));
    }

    /**
     * Get json data from redis
     * This method is used to get json data from redis.
     *
     * @param string $hashName
     * @param string $key
     * @return string|false
     */
    public static function getJsonData(string $hashName, string $key): mixed
    {
        return json_decode(self::hget($hashName, $key), true);
    }

    /**
     * Get message pack data from redis
     * This method is used to get message pack data from redis.
     *
     * @param string $hashName
     * @param string $key
     * @return array|false
     */
    public static function getMessagePackData(string $hashName, string $key): mixed
    {
        return MessagePack::unpack(self::hget($hashName, $key));
    }

    /**
     * Set counter value
     * This method is used to set counter value.
     *
     * @param string $key
     * @return int
     */
    public static function setCountIncrement(string $key): int
    {
        $counter = Redis::get($key);
        if (empty($counter)) {
            Redis::set($key, 1);
        } else {
            Redis::set($key, $counter + 1);
        }

        return $counter + 1;
    }

    /**
     * Get counter value
     * This method is used to get counter value.
     *
     * @param string $key
     * @return integer|false
     */
    public static function getCounter(string $key): int|false
    {
        if (Redis::exists($key)) {
            return Redis::get($key);
        } else {
            return Redis::set($key, 0);
        }
    }
}
