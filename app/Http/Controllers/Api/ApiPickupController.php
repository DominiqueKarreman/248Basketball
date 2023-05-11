<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Group;
use App\Models\Pickup;
use App\Models\PickupPlayer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiPickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        $user = auth()->user();
        // $pickups = Pickup::query()
        //     ->select('pickups.*', 'groups.name', 'pickup_players.*')
        //     ->leftJoin('groups', 'pickups.group', '=', 'groups.id')

        //     ->get();
        $pickups = Pickup::all();
        $pickupReturn = [];
        $pickups = Pickup::query()
            ->select('pickups.*', 'groups.name as group_name')
            ->leftJoin('groups', 'pickups.group', '=', 'groups.id')
            ->get();
        $pickups = $pickups->map(function ($pickup) {
            $pickup->players = PickupPlayer::query()
                ->select('pickup_players.*', 'users.name as player_name')
                ->leftJoin('users', 'pickup_players.user', '=', 'users.id')
                ->where('group', $pickup->group)
                ->get();
            return $pickup;
        });
        foreach ($pickups as $pickup) {
            $pickup->loggedInUser = $user->id;
            if ($pickup->creator == $user->id || $pickup->players->contains('user', $user->id) || $pickup->is_private == false) array_push($pickupReturn, $pickup);
        }


        return response($pickupReturn);
    }

    public function createPickupGame(Request $request)
    {
        $user = auth()->user();
        $group = new Group([
            'name' => $request->group_name,
            'user_id' => $user->id,
        ]);
        $group->save();
        $pickup = new Pickup([
            'is_active' => false,
            'is_official' => false,
            'is_private' => $request->is_private ?? true,
            'name' => $request->name,
            'veld' => $request->veld,
            'max_players' => $request->max_players,
            'current_players' => 0,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'description' => $request->description,
            'group' => $group->id,
            'creator' => auth()->id(),
        ]);
        $pickup->save();
        $playerIds = $request->player_ids;
        // dd($playerIds, $group);
        $creator = new PickupPlayer([
            'group' => $group->id,
            'user' => auth()->id(),
            'pickup' => $pickup->id,
            'accepted' => true,
        ]);
        $creator->save();
        foreach ($playerIds as $playerId) {
            if ($playerId == auth()->id()) {
                continue;
            }

            try {
                $user = User::findOrFail($playerId);
            } catch (ModelNotFoundException $e) {
                $pickupPlayersDelete = PickupPlayer::query()
                    ->where('pickup', $pickup->id)
                    ->get();
                foreach ($pickupPlayersDelete as $pickupPlayerDelete) {
                    $pickupPlayerDelete->delete();
                }

                $pickup->delete();
                $group->delete();

                return response()->json([
                    'error' => 'Gebruiker: ' . $playerId . " bestaat niet",
                ], 404);
            }

            $pickupPlayer = new PickupPlayer([
                'group' => $group->id,
                'user' => $playerId,
                'pickup' => $pickup->id,
            ]);
            $pickupPlayer->save();
        }
        return response()->json([
            'message' => 'Pickup game created successfully',
            'pickup' => $pickup,
        ], 201);
    }

    public function getPickupRequests()
    {
        $user = auth()->user();

        $pickups = Pickup::query()
            ->select('pickups.*', 'groups.name as group_name')
            ->leftJoin('groups', 'pickups.group', '=', 'groups.id')
            ->join('pickup_players', function ($join) use ($user) {
                $join->on('groups.id', '=', 'pickup_players.group')
                    ->where('pickup_players.user', '=', $user->id)
                    ->where('pickup_players.accepted', '=', false);
            })
            ->get();

        return response()->json([
            'pickups' => $pickups,
        ]);
    }
    public function removePlayerFromPickup($id, $userId)
    {
        $user = auth()->user();

        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup: ' . $id .  " bestaat niet",
            ], 404);
        }

        if ($user->id != $pickup->creator) {
            return response()->json([
                'error' => 'Alleen de eigenaar kan spelers verwijderen van de pickup',
            ], 403);
        }


        try {
            $pickupPlayer = PickupPlayer::query()
                ->where('pickup', $id)
                ->where('user', $userId)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Speler: ' . $userId .  " bestaat niet",
            ], 404);
        }
        $pickupPlayer->delete();

        return response()->json([
            'message' => 'Player removed from pickup successfully',
        ]);
    }
    public function DecidePickupInvitation(Request $request, $id)
    {
        $user = auth()->user();


        try {
            $pickupPlayer = PickupPlayer::query()
                ->where('pickup', $id)
                ->where('user', $user->id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Geen uitnodiging gevonden voor pickup id: ' . $id,
            ], 404);
        }



        if ($request->accepted) {
            $pickupPlayer->accepted = true;
            $pickupPlayer->save();
        } else {
            $pickupPlayer->delete();
        }

        return response()->json([
            'message' => 'Pickup invitation updated successfully',
            'pickup_player' => $pickupPlayer,
        ]);
    }

    public function inviteToPickup(Request $request, $id)
    {
        $user = auth()->user();


        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup: ' . $id .  " bestaat niet",
            ], 404);
        }

        try {
            $pickupPlayer = PickupPlayer::query()
                ->where('pickup', $id)
                ->where('user', $user->id)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Jij maakt geen deel uit van de pickup met id: ' . $id,
            ], 404);
        }

        if ($request->user_ids == null) {
            return response()->json([
                'error' => 'Geen gebruikers meegegeven',
            ], 404);
        }
        $userIds = $request->user_ids;

        foreach ($userIds as $userId) {
            if ($userId == $user->id) {
                continue;
            }

            $pickupPlayer = new PickupPlayer([
                'group' => $pickup->group,
                'user' => $userId,
                'pickup' => $pickup->id,
            ]);
            $pickupPlayer->save();
        }

        return response()->json([
            'message' => 'Users invited to pickup successfully',
        ]);
    }
    public function getPickupPlayers($id)
    {
        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup: ' . $id .  " bestaat niet",
            ], 404);
        }

        $players = $pickup->players();

        return response()->json([
            'players' => $players,
        ]);
    }
    public function updatePickup(Request $request, $id)
    {
        $user = auth()->user();

        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup not found',
            ], 404);
        }

        if ($user->id != $pickup->creator) {
            return response()->json([
                'error' => 'Only the creator of the pickup can update it',
            ], 403);
        }

        $pickup->update($request->all());

        return response()->json([
            'message' => 'Pickup updated successfully',
            'pickup' => $pickup,
        ]);
    }
}
