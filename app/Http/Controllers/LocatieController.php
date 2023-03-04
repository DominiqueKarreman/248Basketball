<?php

namespace App\Http\Controllers;

use App\Models\Locatie;
use App\Http\Requests\StoreLocatieRequest;
use App\Http\Requests\UpdateLocatieRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class LocatieController extends Controller
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
    public function store(StoreLocatieRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Locatie $locatie): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locatie $locatie): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocatieRequest $request, Locatie $locatie): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locatie $locatie): RedirectResponse
    {
        //
    }
}
