<?php

namespace App\Observers;

use App\Models\ActivityLog;

class ModelObserver
{
    /**
     * Handle the Model "created" event.
     */
    public function created($model): void
    {
        ActivityLog::create([
            'model' => class_basename($model),
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'created',
            'changes' => json_encode($model->getAttributes()),
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username ?? 'Guest',
        ]);
    }

    /**
     * Handle the Model "updated" event.
     */
    public function updated($model): void
    {
        if ($model->wasRecentlyRestored) {
            return;
        }

        ActivityLog::create([
            'model' => class_basename($model),
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'updated',
            'changes' => json_encode($model->getChanges()),
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username ?? 'Guest',
        ]);
    }

    /**
     * Handle the Model "deleted" event.
     */
    public function deleted($model): void
    {
        if ($model->isForceDeleting()) {
            return;
        }

        ActivityLog::create([
            'model' => class_basename($model),
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'deleted',
            'changes' => null,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username ?? 'Guest',
        ]);
    }

    /**
     * Handle the Model "restored" event.
     */
    public function restored($model): void
    {
        ActivityLog::create([
            'model' => class_basename($model),
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'restored',
            'changes' => null,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username ?? 'Guest',
        ]);
    }

    /**
     * Handle the Model "force deleted" event.
     */
    public function forceDeleted($model): void
    {
        ActivityLog::create([
            'model' => class_basename($model),
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'permanently_deleted',
            'changes' => null,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->username ?? 'Guest',
        ]);
    }
}
