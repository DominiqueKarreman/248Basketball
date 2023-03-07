<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
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

        $roles = Role::select('id', 'name')->withCount('permissions')->orderBy('name')->get();
        // dd($roles);
        return view('permissions.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if (!auth()->user()->hasPermissionTo('view roles')) {
            abort('403');
        } 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}