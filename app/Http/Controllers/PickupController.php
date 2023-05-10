<?php

namespace App\Http\Controllers;

use view;
use App\Models\User;
use App\Models\Veld;
use App\Models\Pickup;
use App\Models\Locatie;
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
    public function create()
    {
        //
        $velden = Veld::all();
        $pickups = Pickup::all();
        $locaties = Locatie::all();
        return response(view('pickups.create', [
            "pickups" => $pickups,
            "velden" => $velden,
            "locaties" => $locaties,
            "users" => User::all()
        ]));
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
