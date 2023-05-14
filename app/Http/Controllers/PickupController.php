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
        $pickups = Pickup::join('users', 'pickups.creator', '=', 'users.id')
            ->join('velden', 'pickups.veld', '=', 'velden.id')
            ->join('groups', 'pickups.group', '=', 'groups.id')
            ->select('pickups.*', 'users.name as creator', 'velden.naam as veld', 'velden.id as veld_id', 'groups.name as group')
            ->get();
        foreach ($pickups as $pickup) {
            $pickup->aanmeldingen = PickupPlayer::where('pickup', $pickup->id)
                ->where('accepted', true)
                ->count();
        }
        return response(view('pickups.index', [
            "pickups" => $pickups,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $velden = Veld::all();
        $groups = Group::all();
        $locaties = Locatie::all();

        return view('pickups.create', [
            'velden' => $velden,
            'groups' => $groups,
            'locaties' => $locaties,
            'users' => User::all(),
        ]);
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
