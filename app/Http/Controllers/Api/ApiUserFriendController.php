<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\UserFriend;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserFriendRequest;
use App\Http\Requests\UpdateUserFriendRequest;

class ApiUserFriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth()->user();
        // dd($user);
        $friends = UserFriend::where('user_id', $user->id)->where('is_mutual', 1)->join('users', 'user_friends.friends_id', '=', 'users.id')->select('user_friends.*', 'users.name', 'users.profile_photo_path', 'user_friends.id as id')->get();
        foreach ($friends as $friend) {
            if ($friend->profile_photo_path) {
                $photo = "http://116.203.134.102/storage/" . $user->profile_photo_path;
            } else {
                $photo = $friend->profile_photo_url;
                $photo = str_replace("7F9CF5", "EDB12C", $photo);
                $photo = str_replace("EBF4FF", "222222", $photo);
            }
            $friend->profile_pic = $photo;
        }
        // dd($user->name, $user->id);
        // dd($friends);
        return Response($friends, 200);
    }
    public function socialFriends(string $provider): Response
    {
        $user = Auth()->user();
        if ($provider === "facebook") {
            $users = User::where('facebook_id', '!=', null)->get();
        } else if ($provider === "google") {
            $users = User::where('google_id', '!=', null)->get();
        } else if ($provider === "whatsapp") {
            $users = User::where('phone_number', '!=', null)->get();
            foreach ($users as $key => $friend) {

                $relation = UserFriend::where('user_id', $user->id)->where('friends_id', $friend->id)->first() || UserFriend::where('user_id', $friend->id)->where('friends_id', $user->id)->first();
                if ($relation) {
                    unset($users[$key]);
                }
            }
        } else {
            return response(["message" => "Provider " . $provider . " is niet ondersteund"], 404);
        }
        // dd($users);

        // $friends = UserFriend::where('user_id', $user->id)->where('is_mutual', 1)->get();

        // dd($friends);
        return Response($users, 200);
    }
    public function requests(): Response
    {
        $user = Auth()->user();
        $friends = UserFriend::where('friends_id', $user->id)->where('is_mutual', 0)->join('users', 'user_friends.user_id', '=', 'users.id')->select('user_friends.*', 'users.*', 'user_friends.id as id')->get();

        // dd($friends);
        return Response($friends, 200);
    }

    public function decide(int $id, Request $request)
    {
        $friendRequest = UserFriend::where('id', $id)->where('is_mutual', 0)->first();
        if (!$friendRequest)
            return response(["message" => "Kan de vriendschapsverzoek met id " . $id . " niet vinden"], 404);

        $user = Auth()->user();

        if ($user->id !== $friendRequest->friends_id) {
            return abort(403);
        }
        if ($request->decision == 'Accept') {
            $friendRequest->is_mutual = true;
            $friendRequest->request_accepted_at = now();
            $friendRequest->save();
            UserFriend::firstOrCreate(["user_id" => $user->id, "friends_id" => $friendRequest->user_id, "is_mutual" => true, "request_accepted_at" => now()]);
            return response(["message" => "Vriendschapsverzoek succesvol geaccepteerd"], 200);
        }
        if ($request->decision == 'Decline') {
            $friendRequest->delete();
            return response(["message" => "Vriendschapsverzoek succesvol verwijderd"], 204);
        } elseif ($request->decision !== 'Accept' && $request->decision !== 'Decline') {
            return response(["message" => "Geen geldige keuze gemaakt"], 400);
        }
        // dd($id, $friendRequest, $user->name, $user->id, $request->all());    
    }


    // Show the form for creating a new resource.

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserFriendRequest $request)
    {
        if (!$request->all())
            return response(["message" => "Geen vriendschapsverzoek ontvangen"], 400);
        if ($request->friend_id == Auth()->user()->id)
            return response(["message" => "Je kan jezelf niet toevoegen als vriend"], 400);
        if (UserFriend::where('user_id', Auth()->user()->id)->where('friends_id', $request->friend_id)->where('is_mutual', 0)->exists())
            return response(["message" => "Je hebt al een verzoek gestuurd naar deze gebruiker"], 400);
        if (UserFriend::where('user_id', Auth()->user()->id)->where('friends_id', $request->friend_id)->where('is_mutual', 1)->exists())
            return response(["message" => "Je bent al vrienden met deze gebruiker"], 400);
        if (UserFriend::where('user_id', $request->friend_id)->where('friends_id', Auth()->user()->id)->where('is_mutual', 1)->exists())
            return response(["message" => "Je bent al vrienden met deze gebruiker"], 400);

        $user = Auth()->user();

        $friendRequest = UserFriend::firstOrCreate(["user_id" => $user->id, "friends_id" => $request->friend_id]);
        // dd($friendRequest);
        $friend = User::find($request->friend_id);
        return Response(["message" => "Vriendschapsverzoek naar " . $friend->name . " verstuurd"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserFriend $userFriend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserFriend $userFriend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserFriendRequest $request, UserFriend $userFriend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function unfriend(int $id)
    {
        $user = Auth()->user();

        $friendRelation = UserFriend::where('user_id', $user->id)->where("friends_id", $id)->first();
        if (!$friendRelation)
            return response(["message" => "Kan de vriendschap met id " . $id . " niet vinden"], 404);
        // dd($friendRelation->id);/?
        $userFriend = UserFriend::where('user_id', $friendRelation->friends_id)->where("friends_id", $user->id)->first();
        if ($userFriend->is_mutual == 0)
            return response(["message" => "Je kan geen vriendschapsverzoek verwijderen"], 400);
        if (!$userFriend)
            return response(["message" => "Kan de vriendschap met id " . $id . " niet vinden"], 404);
        // dd($friendRelation, $userFriend);
        $friendRelation->delete();
        $userFriend->delete();
        return response(["message" => "Vriend succesvol verwijderd"], 204);
    }
}