<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Pickup;
use App\Models\User;

class PickupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasPermissionTo('view pickups');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pickup $pickup): bool
    {
        //
        return $user->hasPermissionTo('view pickups');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->hasPermissionTo('create pickups');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pickup $pickup): bool
    {
        //
        return $user->hasPermissionTo('update pickups');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pickup $pickup): bool
    {
        //
        return $user->hasPermissionTo('delete pickups');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pickup $pickup): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pickup $pickup): bool
    {
        //
    }
}
