<?php
/**
 * Path: app/Observers/ApiPermissionsObserver.php
 * Author: Ahmet Yusuf TOĞTAY
 * E-Mail:
 * Created At: 22.05.2023
 * Version: 1.0.0
 */
namespace App\Observers;

use Exception;
use Illuminate\Http\Request;
use App\Core\Traits\ApiResponseTrait;
use Illuminate\Database\Eloquent\Model;
use App\Core\Base\Observers\BaseObserver;
use App\Core\Constants\Enums\APIRouteEnum;
use App\Core\Extensions\APIPermissionExtension;
use App\Core\Interfaces\Observers\ObserverInterface;
use App\Helpers\RequestHelper;

class ApiPermissionsObserver extends BaseObserver implements ObserverInterface
{
    use ApiResponseTrait;

    /**
     * @var Request $request
     */
    protected $request;

    /**
     * @var User $user
     */
    protected $user;

    /**
     * ApiPermissionsObserver constructor.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = RequestHelper::getRequestUser(request());
    }

    /**
     * Handle the Model "creating" event.
     *
     * @param Model $model
     * @return void
     */
    public function creating(Model $model): void
    {
        if (!APIPermissionExtension::getPermission(APIRouteEnum::STORE, $this->user, $this->getClassName($model))) {
            $this->sendError('Permission Denied', 403);
        }
    }

    /**
     * Handle the Model "created" event.
     *
     * @param Model $model
     * @return void
     */
    public function created(Model $model): void
    {
        //
    }

    /**
     * Handle the Model "updating" event.
     *
     * @param Model $model
     * @return void
     */
    public function updating(Model $model): void
    {
        if (!APIPermissionExtension::getPermission(APIRouteEnum::STORE, $this->user, $this->getClassName($model))) {
            throw new Exception('Permission Denied');
        }
    }

    /**
     * Handle the Model "updated" event.
     *
     * @param Model $model
     * @return void
     */
    public function updated(Model $model): void
    {
        //
    }

    /**
     * Handle the Model "saving" event.
     *
     * @param Model $model
     * @return void
     */
    public function saving(Model $model): void
    {
        if (!APIPermissionExtension::getPermission(APIRouteEnum::STORE, $this->user, $this->getClassName($model))) {
            $this->sendError('Permission Denied', 403);
        }
    }

    /**
     * Handle the Model "saved" event.
     *
     * @param Model $model
     * @return void
     */
    public function saved(Model $model): void
    {
        //
    }

    /**
     * Handle the Model "deleting" event.
     *
     * @param Model $model
     * @return void
     */
    public function deleting(Model $model): void
    {
        if (!APIPermissionExtension::getPermission(APIRouteEnum::STORE, $this->user, $this->getClassName($model))) {
            throw new Exception('Permission Denied', 403);
        }
    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param Model $model
     * @return void
     */
    public function deleted(Model $model): void
    {
        //
    }

    /**
     * Handle the Model "restoring" event.
     *
     * @param Model $model
     * @return void
     */
    public function restoring(Model $model): void
    {
        if (!APIPermissionExtension::getPermission(APIRouteEnum::STORE, $this->user, $this->getClassName($model))) {
            throw new Exception('Permission Denied');
        }
    }

    /**
     * Handle the Model "restored" event.
     *
     * @param Model $model
     * @return void
     */
    public function restored(Model $model): void
    {
        //
    }
}
