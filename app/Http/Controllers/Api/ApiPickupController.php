<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Group;
use App\Models\Pickup;
use App\Models\UserFriend;
use App\Models\PickupPlayer;
use Illuminate\Http\Request;
use App\Models\VeldStatistic;
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

        $pickups = Pickup::all();
        $pickupReturn = [];
        $pickups = Pickup::query()
            ->select('pickups.*', 'groups.name as group_name', 'velden.naam as veld_name', 'velden.img_url as veld_image')
            ->leftJoin('groups', 'pickups.group', '=', 'groups.id')
            ->leftJoin('velden', 'pickups.veld', '=', 'velden.id')
            ->get();
        $pickups = $pickups->map(function ($pickup) {
            $pickup->veld_image = "http://116.203.134.102/" . $pickup->veld_image;
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
    public function activatePickup($id)
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
                'error' => 'Alleen de eigenaar kan de pickup activeren',
            ], 403);
        }

        $pickup->is_active = true;
        $pickup->save();

        return response()->json([
            'message' => 'Pickup game activated successfully.',
            'pickup' => $pickup,
        ]);
    }
    public function createPickupGame(Request $request)
    {
        $user = auth()->user();
        try {
            $group = new Group([
                'name' => $request->group_name,
                'user_id' => $user->id,
            ]);
            $group->save();
        } catch (\Exception $e) {

            return response()->json([
                'error' => 'er ging wat fout: ' . $e,
            ], 404);
        }
        try {
            $pickup = new Pickup([
                'is_active' => false,
                'is_official' => false,
                'is_private' => $request->is_private ?? true,
                'name' => $request->name,
                'veld' => $request->veld,
                'max_players' => $request->max_players,
                'current_players' => 0,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'description' => $request->description,
                'group' => $group->id,
                'creator' => auth()->id(),
            ]);
            $pickup->save();
        } catch (\Exception $e) {
            $group->delete();
            return response()->json([
                'error' => 'er ging wat fout: ' . $e,
            ], 404);
        }
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

    public function addGameResult(Request $request, $id)
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
                'error' => 'Alleen de eigenaar kan game resultaten doorgeven',
            ], 403);
        }
        if (!$request->winners || !$request->losers) {
            return response()->json([
                'error' => 'Geen winnaars of verliezers meegegeven',
            ], 404);
        }

        $winnerIds = $request->winners;
        $loserIds = $request->losers;

        $winners = PickupPlayer::whereIn('user', $winnerIds)
            ->where('pickup', $pickup->id)
            ->get();

        $losers = PickupPlayer::whereIn('user', $loserIds)
            ->where('pickup', $pickup->id)
            ->get();

        foreach ($winners as $winner) {
            $winner->current_wins++;
            $winner->save();
        }

        foreach ($losers as $loser) {
            $loser->current_losses++;
            $loser->save();
        }

        return response()->json([
            'message' => 'Game result added successfully.',
            'winners' => $winners,
            'losers' => $losers,
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

    public function savePickupPlayerStats($id)
    {
        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup bestaat niet',
            ], 404);
        }

        $pickupPlayers = PickupPlayer::all();
        foreach ($pickupPlayers as $pickupPlayer) {
            $veldStatistic = VeldStatistic::where('user', $pickupPlayer->user)
                ->where('veld', $pickup->veld)
                ->first();

            if (!$veldStatistic) {
                $veldStatistic = new VeldStatistic();
                $veldStatistic->user = $pickupPlayer->user;
                $veldStatistic->veld = $pickup->veld;
            }

            $veldStatistic->wins += $pickupPlayer->current_wins;
            $veldStatistic->losses += $pickupPlayer->current_losses;
            $veldStatistic->games_played += $pickupPlayer->current_games_played;

            if ($pickupPlayer->misses) {
                $veldStatistic->misses += $pickupPlayer->current_misses;
            }

            if ($pickupPlayer->makes) {
                $veldStatistic->makes += $pickupPlayer->current_makes;
            }

            if ($pickupPlayer->points) {
                $veldStatistic->points += $pickupPlayer->current_points;
            }

            $veldStatistic->save();
        }

        return response()->json([
            'message' => 'Pickup player stats saved to veld statistics successfully.',
        ]);
    }

    public function usersToInvite()
    {
        $user = auth()->user();
        $users = User::all();
        $usersToInvite = [];
        $userRelations = UserFriend::where('user_id', $user->id)->orWhere('friends_id', $user->id)->get();
        //check if the user is already friends with the user
        foreach ($userRelations as $friend) {
            if ($friend->user_id == $user->id) {
                $friendId = $friend->friends_id;
                $friend = $users->where('id', $friendId)->first();
                array_push($usersToInvite, $friend);
            }
        }
        //put the rest of the users in the array
        foreach ($users as $user) {
            if (auth()->user()->id == $user->id) {
                continue;
            }
            //no duplicate values in the array
            if (in_array($user, $usersToInvite)) {
                continue;
            }
            array_push($usersToInvite, $user);
        }

        return response()->json([
            'users' => $usersToInvite,
        ]);
    }

    public function deactivatePickup($id)
    {
        $user = auth()->user();
        try {
            $pickup = Pickup::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Pickup bestaat niet',
            ], 404);
        }
        if ($user->id != $pickup->creator) {
            return response()->json([
                'error' => 'Alleen de eigenaar kan een pickup deactiveren',
            ], 403);
        }

        $pickup->is_active = false;
        $pickup->save();

        return response()->json([
            'message' => 'Pickup game deactivated successfully.',
            'pickup' => $pickup,
        ]);
    }
}
