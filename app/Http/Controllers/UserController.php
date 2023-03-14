<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        }
        $users = User::all();
        $roles = Role::all();
        return view('users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {


    // }


    public function register(Request $request)
    {
        //this will make sure these fields are required
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        //here we create the user
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        //make a token
        $token = $user->createToken('248token')->plainTextToken;

        //make the response
        $response = [
            'user' => $user,
            'token' => $token
        ];

        //return a response and a status code
        return response($response, 201);
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
                'message' => 'Uw inloggegevens zijn incorrect'
            ], 403);
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
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        }
        $user = User::find($user);

        return view('users.edit', [
            'user' => $user
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        // Update the Veld model with the new data from the request

        // ...


        // Redirect back to the index page
        return redirect()->route('users.index');
    }
    public function changeRoles(Request $request, $id)
    {

        $user = User::find($id);
        $user->syncRoles([]);
        $user->assignRole($request->user_role);
        return redirect()->route('users.index')->banner('Rol is gewijzigd');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}