<?php
/**
 * Path: app/Observers/ApiStatisticsObserver.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 22.05.2023
 */
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Core\Base\Observers\BaseObserver;
use App\Core\Interfaces\Observers\ObserverInterface;
use App\Core\Traits\ApiResponseTrait;

class ApiStatisticsObserver extends BaseObserver implements ObserverInterface
{
    use ApiResponseTrait;
    /**
     * Handle the Model "creating" event.
     *
     * @param Model $model
     * @return void
     */
    public function creating(Model $model): void
    {

    }

    /**
     * Handle the Model "created" event.
     *
     * @param Model $model
     * @return void
     */
    public function created(Model $model): void
    {

    }

    /**
     * Handle the Model "updating" event.
     *
     * @param Model $model
     * @return void
     */
    public function updating(Model $model): void
    {

    }

    /**
     * Handle the Model "updated" event.
     *
     * @param Model $model
     * @return void
     */
    public function updated(Model $model): void
    {

    }

    /**
     * Handle the Model "saving" event.
     *
     * @param Model $model
     * @return void
     */
    public function saving(Model $model): void
    {

    }

    /**
     * Handle the Model "saved" event.
     *
     * @param Model $model
     * @return void
     */
    public function saved(Model $model): void
    {

    }

    /**
     * Handle the Model "deleting" event.
     *
     * @param Model $model
     * @return void
     */
    public function deleting(Model $model): void
    {

    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param Model $model
     * @return void
     */
    public function deleted(Model $model): void
    {

    }

    /**
     * Handle the Model "restoring" event.
     *
     * @param Model $model
     * @return void
     */
    public function restoring(Model $model): void
    {

    }

    /**
     * Handle the Model "restored" event.
     *
     * @param Model $model
     * @return void
     */
    public function restored(Model $model): void
    {

    }
}
