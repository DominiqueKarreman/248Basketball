<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Veld;
use App\Models\Event;
use App\Models\Locatie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        phpinfo();
        if (!auth()->user()->hasPermissionTo('view events')) {
            abort('403');
        }

        $events = Event::query()
            ->select('events.*', 'users.name as verantwoordelijke')
            ->leftJoin('users', 'events.verantwoordelijke', '=', 'users.id')->get();

        $first = $events->first();
        $first->openEvent();
        return response(view('events.index', [
            'events' => $events,
        ]), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
        $users = User::all();
        $velden = Veld::all();
        $locaties = Locatie::all();
        return response(view('events.create', [
            'users' => $users,
            'velden' => $velden,
            'locaties' => $locaties,
        ]), 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {
        //
        // dd($request->all());
        if($request->locatie_id == "new"){
            $locatieModel = new Locatie();
            $locatieModel->naam = $request->naam;
            $locatieModel->adres = $request->locatie_naam;
            $locatieModel->postcode = $request->postcode;
            $locatieModel->plaats = $request->plaats;
            $locatieModel->longitude = $request->longitude;
            $locatieModel->latitude = $request->latitude;
            $locatieModel->save();
            $locatie_id = $locatieModel->id;
            
        } else {
            $locatie_id = $request->locatie_id;
        }

        $this->authorize('create', Event::class);
        $event = new Event();
        $event->naam = $request->naam;
        $event->verantwoordelijke = $request->verantwoordelijke;
        $event->datumTijd = $request->start_tijd;
        $event->capaciteit = $request->capaciteit;
        $event->duratie = strtotime($request->eind_tijd) - strtotime($request->start_tijd);
        $event->beschrijving = $request->beschrijving;
        $event->prijs = $request->prijs;
        // $event->img_url = $request->img_url;
        $event->locatie = $request->locatie_naam;
        $event->locatie_id = $locatie_id;
        if ($request->hasFile('img_url')) {
            $img_url = "storage/events/" . $request->file('img_url')->getClientOriginalName();
            $request->file('img_url')->storeAs('public/events', $request->file('img_url')->getClientOriginalName());
        } else {
            $img_url = 'null';
        }
        $event->img_url = $img_url;
        $event->veld_id = $request->veld_id;
        // if($locatie_id !== null){
        //     $event->veld_id = null;
        // }
        $event->save();
        return redirect()->route('events.index')->banner('Evenement aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): Response
    {
        //
        $eventT = Event::find($event->id);
        $eventT->veld = Veld::find($event->veld_id);
        $eventT->locatie = Locatie::find($event->locatie_id);
        $eventT->verantwoordelijke = User::find($event->verantwoordelijke);
        $eventT->latitude = $eventT->locatie ? $eventT->locatie->latitude : $eventT->veld->latitude;
        $eventT->longitude = $eventT->locatie ? $eventT->locatie->longitude : $eventT->veld->longitude;
        return response(view('events.show', [
            'event' => $event,
            'eventT' => $eventT,
        ]), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        //
    }
}