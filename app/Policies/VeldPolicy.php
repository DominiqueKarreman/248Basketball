<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Veld;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
class VeldPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->hasPermissionTo('view velden');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Veld $veld): bool
    {
        //
        return $user->hasPermissionTo('view velden');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->hasPermissionTo('create velden');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Veld $veld): bool
    {
        //
        return $user->hasPermissionTo('edit velden');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Veld $veld): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Veld $veld): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Veld $veld): bool
    {
        //
    }
}
