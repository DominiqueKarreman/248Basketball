<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Veld;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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

        $veld = veld::find($id);
        $pickups = Pickup::query()
            ->select('pickups.*', 'users.name as creator_name', 'users.profile_photo_path as creator_img_url')
            ->leftJoin('users', 'pickups.creator', '=', 'users.id')
            ->where('veld', $id)
            ->get();
        foreach ($pickups as $pickup) {
            $user = new User();
            if ($pickup->creator_img_url == null) {
                $pickup->creator_img_url = $user->getUserProfilePhotoUrl($pickup->creator);
            } else {
                $pickup->creator_img_url = "http://116.203.134.102/storage/" . $pickup->creator_img_url;
            }
        }
        $accessiblePickups = [];
        foreach ($pickups as $pickup) {
            if (auth()->user()->can('view', $pickup)) {
                array_push($accessiblePickups, $pickup);
            }
            $pickup->players = $pickup->players();

            foreach ($pickup->players as $player) {
                $user = User::find($player->user);
                // dd($user->profile_photo_path);
                if ($user->profile_photo_path == null) {
                    $player->photo = $user->getUserProfilePhotoUrl($user->id);
                } else {
                    $player->photo = "http://116.203.134.102/storage/" . $user->profile_photo_path;
                }
            }
        }

        $veld->pickups = $accessiblePickups;
        if ($veld) {
            $responseBody = [
                'veld' => $veld,
                'logged in user' => auth()->user()->name,
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
