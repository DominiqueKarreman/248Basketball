<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\UserNotificationToken;
use App\Http\Requests\StoreUserNotificationTokenRequest;
use App\Http\Requests\UpdateUserNotificationTokenRequest;

class ApiUserNotificationTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response 
    {
        //
        $notis = UserNotificationToken::all();
        return response($notis);
    }

    /**
     * Show the form for creating a new resource
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        //
      $token =  UserNotificationToken::firstOrCreate(["device_name" => $request->device_name, "user_id" => $request->user_id, "token" => $request->token]);
      return response($token);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserNotificationToken $userNotificationToken)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserNotificationToken $userNotificationToken)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserNotificationTokenRequest $request, UserNotificationToken $userNotificationToken)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $userNotificationToken = UserNotificationToken::find($id);
        if($userNotificationToken == null) return response(["message"=> "no token found"]);
        $userNotificationToken->delete();
        return response(['message' => "token for device: " . $userNotificationToken->device_name .  "destroyed succesfully"]);
    }
}
