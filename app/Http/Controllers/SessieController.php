<?php

namespace App\Http\Controllers;

use App\Models\Sessie;
use App\Http\Requests\StoreSessieRequest;
use App\Http\Requests\UpdateSessieRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class SessieController extends Controller
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
    public function store(StoreSessieRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sessie $sessie): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sessie $sessie): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessieRequest $request, Sessie $sessie): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sessie $sessie): RedirectResponse
    {
        //
    }
}
