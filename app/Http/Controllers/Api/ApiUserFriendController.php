<?php

namespace App\Http\Controllers\Api;

use App\Models\UserFriend;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserFriendRequest;
use App\Http\Requests\UpdateUserFriendRequest;
use Illuminate\Http\Request;

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
        $friends = UserFriend::where('user_id', $user->id)->where('is_mutual', 1)->get();

        // dd($user->name, $user->id);
        // dd($friends);
        return Response($friends, 200);


    }

    public function requests(): Response
    {
        $user = Auth()->user();
        $friends = UserFriend::where('friends_id', $user->id)->where('is_mutual', 0)->get();
        dd($friends);
    }

    public function decide(int $id, Request $request)
    {
        $friendRequest = UserFriend::where('id', $id)->where('is_mutual', 0)->first();
        if(!$friendRequest) return response(["message" => "Kan de vriendschapsverzoek met id " . $id . " niet vinden"], 404);

        $user = Auth()->user();

        if ($user->id !== $friendRequest->friends_id) {
            return abort(403);
        }
        if ($request->decision == 'Accept') {
            $friendRequest->is_mutual = true;
            $friendRequest->request_accepted_at = now();
            $friendRequest->save();
            UserFriend::firstOrCreate(["user_id" => $user->id, "friends_id" => $friendRequest->user_id, "is_mutual" => true, "request_accepted_at" => now()]);
        }
        if($request->decision == 'Decline') {
            $friendRequest->delete();
            return response(["message" => "Vriendschapsverzoek succesvol verwijderd"],204);
        }
        dd($id, $friendRequest, $user->name, $user->id, $request->all());
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
        $user = Auth()->user();

        $friendRequest = UserFriend::firstOrCreate(["user_id" => $user->id, "friends_id" => $request->friend_id]);
        dd($friendRequest);
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

        $friendRelation = UserFriend::where('user_id', $user->id)->where("friends_id", $id)->get();
        $userFriend = UserFriend::where('user_id', $friendRelation->user_id)->where("friends_id", $user->id)->get();
        dd($friendRelation, $userFriend);
        $friendRelation->delete();
        $userFriend->delete();
        return response(204);
    }
}