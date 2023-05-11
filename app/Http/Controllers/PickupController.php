<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Veld;
use App\Models\Group;
use App\Models\Pickup;
use App\Models\Locatie;
use App\Models\PickupPlayer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePickupRequest;
use App\Http\Requests\UpdatePickupRequest;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        $pickups = Pickup::all();
        return response(view('pickups.index', [
            "pickups" => $pickups,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
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
        foreach ($playerIds as $playerId) {
            $pickupPlayer = new PickupPlayer([
                'group' => $group->id,
                'user' => $playerId,
            ]);
            $pickupPlayer->save();
        }
        return response()->json([
            'message' => 'Pickup game created successfully',
            'pickup' => $pickup,
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePickupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pickup $pickup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pickup $pickup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePickupRequest $request, Pickup $pickup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pickup $pickup)
    {
        //
    }
}
