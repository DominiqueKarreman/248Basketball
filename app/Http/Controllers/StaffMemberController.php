<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffMemberRequest;
use App\Http\Requests\UpdateStaffMemberRequest;
use Illuminate\Support\Facades\Storage;

class StaffMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (!auth()->user()->hasPermissionTo('view staffMembers')) {
            abort('403');
        }
        $users = StaffMember::all();

        return view('staff.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //check user permissions
        if (!auth()->user()->hasPermissionTo('create staffMembers')) {
            abort('403');
        }
        $users = User::all();

        return view('staff.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffMemberRequest $request)
    {
        //check permission
        if (!auth()->user()->hasPermissionTo('create staffMembers')) {
            abort('403');
        }
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
    public function edit($id)
    {
        //check permission
        if (!auth()->user()->hasPermissionTo('edit staffMembers')) {
            abort('403');
        }
        $staffMember = StaffMember::find($id);
        // dd($staffMember->image);
        return response(view('staff.edit', ["staffMember" => $staffMember, "users" => User::all()]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //check permission
        if (!auth()->user()->hasPermissionTo('edit staffMembers')) {
            abort('403');
        }

        //create function for update
        $staffMember = StaffMember::find($id);
        if ($request->hasFile('img_url')) {
            //remove old photo from storage folder
            //replace "/storage" with "" to get the path

            $file = str_replace("/storage", "", $staffMember->image);
            File::delete($file);
            // dd(File::exists($file), $file);
            if (is_file($staffMember->image)) {
                // 1. possibility
                Storage::delete($staffMember->image);
                // 2. possibility

            } else {
                echo "File does not exist";
            }
            $img_url = "storage/staff/" . $request->file('img_url')->getClientOriginalName() . "v=" . time();
            $request->file('img_url')->storeAs('public/staff', $request->file('img_url')->getClientOriginalName() . "v=" . time());
        } else {
            $img_url = $staffMember->image;
        }

        if ($request->hasFile('video')) {
            //remove old video fro storage first
            $file = str_replace("/storage", "", $staffMember->image);
            File::delete(storage_path($file));
            if (is_file($staffMember->video)) {
                // 1. possibility
                Storage::delete($staffMember->image);
                // 2. possibility

            } else {
                echo "File does not exist";
            }
            $video_url = "storage/staff/" . $request->file('video')->getClientOriginalName() . "v=" . time();
            $request->file('video')->storeAs('public/staff', $request->file('video')->getClientOriginalName() . "v=" . time());
        } else {
            $video_url = $staffMember->video;
        }

        $staffMember->update([
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
        return redirect()->route('staff')->banner('Veld is geupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //check rights
        if (!auth()->user()->hasPermissionTo('delete staffMembers')) {
            abort('403');
        }
        //find staff member
        $staffMember = StaffMember::find($id);
        //remove image from storage
        $file = str_replace("/storage", "", $staffMember->image);
        File::delete(storage_path($file));
        //remove video from storage
        $file = str_replace("/storage", "", $staffMember->video);
        File::delete(storage_path($file));
        //remove staff member from database

        $staffMember->delete();
        return redirect()->route('staffMembers')->banner('Veld is verwijderd');
    }
}
