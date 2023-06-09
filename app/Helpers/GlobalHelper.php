<?php
/**
 * Path: app/Helpers/GlobalHelper.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail: yusuf.togtay@gmail.com
 * Created At: 26.05.2023
 * Version: 1.0.0
 */

namespace App\Helpers;

use ReflectionClass;
use Illuminate\Support\Facades\File;

/**
 * Global helper
 * This class is used to define global helper.
 * @package App\Helper
 * @version 1.0.0
 * @since 1.0.0
 */
class GlobalHelper
{
    /**
     * Get models
     * This method is used to get all models.
     *
     * @return array
     */
    public static function getModels(): array
    {
        $models = [];
        foreach (File::allFiles(app_path('Models')) as $file) {
            $models[] = new ReflectionClass('App\Models\\' . basename($file, '.php'));
        }
        return $models;
    }

    /**
     * Get fillable fields
     * This method is used to get fillable fields.
     *
     * @param string $modelName
     * @return array
     */
    public static function getFillableFields(string $modelName): array
    {
        $modelClass = 'App\\Models\\' . $modelName;

        if (class_exists($modelClass)) {
            $modelInstance = new $modelClass();

            if (method_exists($modelInstance, 'getFillable')) {
                //$fillableFields[$modelName] = $modelInstance->getFillable();
                return $modelInstance->getFillable();
            } else {
                return [];
            }
        } else {
            return [];
        }
    }
}
