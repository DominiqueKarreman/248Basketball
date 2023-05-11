<?php

namespace App\Http\Controllers\Api;

use App\Models\Pickup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiPickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response 
    {
        //
        $pickups = Pickup::query()
        ->select('pickups.*', 'groups.*')
        ->leftJoin('groups', 'pickups.group', '=', 'groups.id')->get();
        return response($pickups);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function update(Request $request, Pickup $pickup)
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
