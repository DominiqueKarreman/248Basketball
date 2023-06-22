<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\UserFriend;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function gebruikers(): Response
    {
        //
        $gebruikers = User::select(['id', 'name', 'email', 'profile_photo_path'])->get();
        //for each with key value pairs
        $nonVriendenGebruikers = [];
        foreach ($gebruikers as $gebruikerIndex => $gebruiker) {
            // $gebruiker->img_url = "http://
            if ($gebruiker->email == Auth()->user()->email) {
                continue;
            }
            $userRelation = UserFriend::where('user_id', Auth()->user()->id)->where('friends_id', $gebruiker->id)->Orwhere('friends_id', Auth()->user()->id)->where("user_id", $gebruiker->id)->first();
            if ($userRelation)
                continue;
            if (!$gebruiker->profile_photo_path) {
                $gebruiker->photo = $gebruiker->profile_photo_url;
                $gebruiker->photo = str_replace("7F9CF5", "EDB12C", $gebruiker->photo);
                $gebruiker->photo = str_replace("EBF4FF", "222222", $gebruiker->photo);
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
    public function factory($amount): Response
    {
        $users = User::factory()->count($amount)->create();
        foreach ($users as $user) {
            $user->assignRole('User');
            $user->profile_photo_path = "https://i.pravatar.cc/300?u=" . $user->email;
            $user->save();
        }

        return response($users);
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
    public function login(Request $request)
    {
        //this will make sure these fields are required

        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check the email
        $user = User::where('email', $fields['email'])->first();


        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Uw inloggevens zijn incorrect'
            ], 401);
        }

        //make a token
        $token = $user->createToken('248token')->plainTextToken;

        //make the response
        $response = [
            'user' => $user,
            'roles' => $user->getRoleNames(),
            'token' => $token
        ];

        //return a response and a status code
        return response($response, 201);
    }


    //because the token gets stored in the database we need a logout function
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //e.preventDefault();
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        }
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user
        ]);
    }
    public function notificationToken(Request $request): Response
    {
        $user = Auth()->user()->id;
        $user = User::find($user);
        if ($user->notification_token == null) {
            $user->notification_token = $request->token;
            $user->save();
            return response(["message" => "Token updated"], 200);
        }
        return response(['message' => 'Token already exists'], 200);
    }
    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id): JsonResponse
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->geboorte_datum = $request->geboorte_datum;

        if ($request->hasFile('profile_picture')) {
            $profile_picture_name = $request->file('profile_picture')->getClientOriginalName();
            $profile_picture_path = 'storage/profile_pictures/' . $profile_picture_name;
            $profile_picture_url = asset('storage/profile_pictures/' . $profile_picture_name);
            $request->file('profile_picture')->storeAs('public/profile_pictures', $profile_picture_name);

            $user->profile_picture_path = $profile_picture_path;
            $user->profile_picture_url = $profile_picture_url;
        }

        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }
}
