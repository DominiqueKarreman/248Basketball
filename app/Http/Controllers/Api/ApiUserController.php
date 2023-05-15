<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //
    }
}