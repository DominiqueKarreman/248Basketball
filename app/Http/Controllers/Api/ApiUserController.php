<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserFriend;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function gebruikers(): Response
    {
        //
        $gebruikers = User::select([ 'id', 'name', 'email', 'profile_photo_path' ])->get();
        //for each with key value pairs
        $nonVriendenGebruikers = [];
        foreach($gebruikers as $gebruikerIndex => $gebruiker){
            // $gebruiker->img_url = "http:// 
            if($gebruiker->email == Auth()->user()->email){
                continue;
            }
            $userRelation = UserFriend::where('user_id', Auth()->user()->id)->where('friends_id', $gebruiker->id)->Orwhere('friends_id', Auth()->user()->id)->where("user_id", $gebruiker->id)->first();
            if($userRelation) continue;
            if(!$gebruiker->profile_photo_path){
                $gebruiker->photo = $gebruiker->profile_photo_url;
                $gebruiker->photo = str_replace("7F9CF5", "EDB12C",   $gebruiker->photo);
                $gebruiker->photo = str_replace("EBF4FF", "222222",   $gebruiker->photo);
                unset($gebruikers[$gebruikerIndex]['profile_photo_url']);
            } else {
                $gebruiker->photo = "http://116.203.134.102/storage/" . $gebruiker->profile_photo_path;
            }
          array_push($nonVriendenGebruikers, $gebruiker);
        }

        return response($nonVriendenGebruikers);
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
    public function show(User $user): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        // get the view
        return view('users.edit', [
            'user' => $user
        ]);

    }
    public function notificationToken(Request $request): Response
    {
        $user = Auth()->user()->id;
        $user = User::find($user);
        if($user->notification_token == null){
            $user->notification_token = $request->token;
            $user->save();
            return response(["message" => "Token updated"], 200);
        }
        return response(['message' => 'Token already exists'], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //
    }
}