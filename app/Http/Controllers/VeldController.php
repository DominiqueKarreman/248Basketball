<?php

namespace App\Http\Controllers;

use App\Models\Veld;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreVeldRequest;
use App\Http\Requests\UpdateVeldRequest;

class VeldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $velden = Veld::all();
        return view('velden.index', compact('velden'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Veld $veld)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($veld)
    {
        $veld = Veld::find($veld);       
        
        return view('velden.edit', [
            'veld' => $veld
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veld $veld)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veld $veld)
    {
        //
    }
}
