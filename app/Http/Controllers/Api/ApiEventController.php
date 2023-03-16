<?php

namespace App\Http\Controllers\Api;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        if (!auth()->user()->hasPermissionTo('view events')) {
            return Response(["message" => 'You are not authorized to view events'], 403);
        }
        $events = Event::all();
        foreach ($events as $event) {
            $event->latitude = $event->getLatLong()['latitude'];
            $event->longitude = $event->getLatLong()['longitude'];
            $event->img_url = "http://116.203.134.102/" . $event->img_url;
        }

        return response($events, 200);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
        if (!auth()->user()->hasPermissionTo('create events')) {
            return Response(["message" => 'You are not authorized to create events'], 403);
        }
        $event = Event::firstOrCreate($request->all());
        //check if the event hasnt already been stored in the database
        if ($event->wasRecentlyCreated) {
            $responseBody = [
                'event' => $event,
                'message' => 'Event created successfully',
            ];
            return Response($responseBody, 201);
        } else {

            $responseBody = [

                'message' => 'Event was already stored in the database',
            ];
            return Response($responseBody, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        //
        if (!auth()->user()->hasPermissionTo('view events')) {
            return Response(["message" => 'You are not authorized to view events'], 403);
        }
        $event = Event::find($id);
        if ($event) {
            $event->latitude = $event->getLatLong()['latitude'];
            $event->longitude = $event->getLatLong()['longitude'];
            $responseBody = [
                'event' => $event,
            ];
            return Response($responseBody, 200);
        } else {
            $responseBody = [
                'message' => 'Event not found',
            ];
            return Response($responseBody, 404);
        }
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
    public function update(Request $request, Event $event): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): Response
    {
        //
        if (!auth()->user()->hasPermissionTo('delete events')) {
            return Response(["message" => 'You are not authorized to delete events'], 403);
        }
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            $responseBody = [
                'message' => 'Event deleted successfully',
                'event' => $event,
            ];
            return Response($responseBody, 200);
        } else {
            $responseBody = [
                'message' => 'Event not found',
            ];
            return Response($responseBody, 404);
        }
    }
}
