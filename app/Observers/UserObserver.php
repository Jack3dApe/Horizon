<?php

namespace App\Observers;

use App\Models\User;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // Se o status mudou para "Suspended"
        if ($user->isDirty('status') && $user->status === 'Suspended') {
            $user->suspended_at = now();
            $user->saveQuietly();
        }

        // Verificar se o status é "Suspended" e se já passaram 5 dias
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

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
