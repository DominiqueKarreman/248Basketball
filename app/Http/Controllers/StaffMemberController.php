<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StaffMember;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffMemberRequest;
use App\Http\Requests\UpdateStaffMemberRequest;

class StaffMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = StaffMember::all();
        return view('staff.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();

        return view('staff.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffMemberRequest $request)
    {


        if ($request->hasFile('img_url')) {
            $img_url = "storage/staff/" . $request->file('img_url')->getClientOriginalName();
            $request->file('img_url')->storeAs('public/staff', $request->file('img_url')->getClientOriginalName());
        } else {
            //redirect with error
            return redirect()->route('staff.index')->with('error', 'Geen afbeelding gevonden!');
        }
        if ($request->hasFile('video')) {
            $video_url = "storage/staff/" . $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/staff', $request->file('video')->getClientOriginalName());
        } else {
            //redirect with error
            return redirect()->route('staff.index')->with('error', 'Geen video gevonden!');
        }
        //
        $staffMember = StaffMember::create([
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->beschrijving,
            'email' => $request->email,
            'image' => $img_url,
            'video' => $video_url,
            'phone' => $request->phone,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'user_id' => $request->user_id,
        ]);

        //response redirect with banner
        return redirect()->route('staff')->banner('Veld is verwijderd');    
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffMember $staffMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffMember $staffMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffMemberRequest $request, StaffMember $staffMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffMember $staffMember)
    {
        //
    }
}
