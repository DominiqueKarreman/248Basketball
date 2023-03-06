<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Locatie;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreLocatieRequest;
use App\Http\Requests\UpdateLocatieRequest;

class LocatieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        return response(view('locaties.index', [
            'locaties' => Locatie::all(),
        ]), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocatieRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($locatie_id): Response
    {
        //
        $locatie = Locatie::find($locatie_id);
        if($locatie->veld_id != null){
            $locatie->veld = $locatie->veld($locatie->veld_id);
        }
        $locatie->events = Event::join('users', 'events.verantwoordelijke', '=', 'users.id')
        ->where('locatie_id', $locatie_id)
        ->orWhere('veld_id', $locatie->veld_id)
        ->get();
        
        //find events where location id or veld_id is the same as the locatie id
        // dd($locatie->events);    
        return response(view('locaties.show', [
            'locatie' => $locatie,
            'events' => $locatie->events,
        ]), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locatie $locatie): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocatieRequest $request, Locatie $locatie): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locatie $locatie): RedirectResponse
    {
        //
    }
}
