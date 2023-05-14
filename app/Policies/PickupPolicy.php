<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Pickup;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

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
        //check if user is creator of pickup

        //check if user is a player in the pickup
        $players = $pickup->players();
        $playerInPickup = false;
        foreach ($players as $player) {
            if ($player->user == $user->id) {
                $playerInPickup = true;
            }
        }
        // dd($user->id == $pickup->creator, $pickup->creator, $user->id, $playerInPickup);
        if ($user->id == $pickup->creator || $playerInPickup || !$pickup->is_private) {
            return true;
        } else {
            return false;
        }
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
        // dd($user->name == $pickup->creator, $pickup->creator, $user->name);
        return $user->hasPermissionTo('edit pickups') || $user->name == $pickup->creator;
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
