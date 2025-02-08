<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\User;
use Carbon\Carbon;

class ModelObserver
{
    /**
     * Handle the Model "created" event.
     */
    public function created($model): void
    {
        $user = auth()->user();
        $modelName = class_basename($model);
        $modelNameField = $this->getModelNameField($model);

        ActivityLog::create([
            'model' => $modelName,
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'created',
            'changes' => json_encode($model->getAttributes()),
            'user_id' => $user->id ?? null,
            'user_name' => $user->username ?? 'Guest',
            'associated_name' => $model->{$modelNameField} ?? 'N/A',
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

        if ($model instanceof User) {
            $this->handleUserSuspension($model);
        }

        $user = auth()->user();
        $modelName = class_basename($model);
        $modelNameField = $this->getModelNameField($model);

        ActivityLog::create([
            'model' => $modelName,
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'updated',
            'changes' => json_encode($model->getChanges()),
            'user_id' => $user->id ?? null,
            'user_name' => $user->username ?? 'Guest',
            'associated_name' => $model->{$modelNameField} ?? 'N/A',
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

        $user = auth()->user();
        $modelName = class_basename($model);
        $modelNameField = $this->getModelNameField($model);

        ActivityLog::create([
            'model' => $modelName,
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'deleted',
            'changes' => null,
            'user_id' => $user->id ?? null,
            'user_name' => $user->username ?? 'Guest',
            'associated_name' => $model->{$modelNameField} ?? 'N/A',
        ]);
    }

    /**
     * Handle the Model "restored" event.
     */
    public function restored($model): void
    {
        $user = auth()->user();
        $modelName = class_basename($model);
        $modelNameField = $this->getModelNameField($model);

        ActivityLog::create([
            'model' => $modelName,
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'restored',
            'changes' => null,
            'user_id' => $user->id ?? null,
            'user_name' => $user->username ?? 'Guest',
            'associated_name' => $model->{$modelNameField} ?? 'N/A',
        ]);
    }

    /**
     * Handle the Model "force deleted" event.
     */
    public function forceDeleted($model): void
    {
        $user = auth()->user();
        $modelName = class_basename($model);
        $modelNameField = $this->getModelNameField($model);

        ActivityLog::create([
            'model' => $modelName,
            'model_id' => $model->getKey() ?? 'N/A',
            'action' => 'permanently_deleted',
            'changes' => null,
            'user_id' => $user->id ?? null,
            'user_name' => $user->username ?? 'Guest',
            'associated_name' => $model->{$modelNameField} ?? 'N/A',
        ]);
    }

    private function getModelNameField($model): string
    {
        $nameFields = [
            'User' => 'username',
            'Genre' => 'name',
            'Publisher' => 'name',
            'Game' => 'name',
        ];

        $modelName = class_basename($model);

        return $nameFields[$modelName] ?? 'id';
    }

    /**
     * Função para lidar com a suspensão automática de usuários
     */
    private function handleUserSuspension(User $user): void
    {
        // Se o status mudou para "Suspended", registra a data da suspensão
        if ($user->isDirty('status') && $user->status === 'Suspended') {
            $user->suspended_at = now();
            $user->saveQuietly();
        }

        // Se o usuário está suspenso, verifica se já passaram 5 dias
        if ($user->status === 'Suspended' && $user->suspended_at) {
            $suspensionEnd = Carbon::parse($user->suspended_at)->addDays(5);

            if (now()->greaterThanOrEqualTo($suspensionEnd)) {
                // Reativar a conta automaticamente
                $user->status = 'Active';
                $user->suspended_at = null;
                $user->saveQuietly();
            }
        }
    }
}
