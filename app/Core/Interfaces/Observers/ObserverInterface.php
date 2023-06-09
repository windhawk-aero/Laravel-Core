<?php

namespace App\Core\Interfaces\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

interface ObserverInterface
{

    public function creating(Model $model): void;

    public function created(Model $model): void;

    public function updating(Model $model): void;

    public function updated(Model $model): void;

    public function saving(Model $model): void;

    public function saved(Model $model): void;

    public function deleting(Model $model): void;

    public function deleted(Model $model): void;

    public function restoring(Model $model): void;

    public function restored(Model $model): void;

    public function sendError($error, $code): JsonResponse;
}
