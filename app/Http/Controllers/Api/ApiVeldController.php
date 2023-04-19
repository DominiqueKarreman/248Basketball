<?php

namespace App\Http\Controllers\Api;

use App\Models\Veld;
use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ApiVeldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
        $velden = Veld::all();
        return response($velden, 200);
    }
    public function locationSorted($lat, $long): Response
    {
        $latitude = $lat;
        $longitude = $long;
        $tempVeld = new Veld();
        $velden = $tempVeld->sortWithDistance($latitude, $longitude);
        return response($velden, 200);
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
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        //
        if (!auth()->user()->hasPermissionTo('view velden')) {
            return Response(["message" => 'You are not authorized to view velden'], 403);
        }
        $veld = veld::find($id);
        if ($veld) {
            $responseBody = [
                'veld' => $veld,
            ];
            return Response($responseBody, 200);
        } else {
            $responseBody = [
                'message' => 'veld not found',
            ];
            return Response($responseBody, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veld $veld): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veld $veld): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veld $veld): RedirectResponse
    {
        //
    }
}
