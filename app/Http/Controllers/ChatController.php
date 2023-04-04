<?php

namespace App\Http\Controllers;

use App\Events\isTyping;
use App\Events\chatMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function typing(Request $request)
    {
        //
        if ($request->typing == true) {

            event(new isTyping($request->username));
            return redirect()->back();
        }


        redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

            event(new chatMessage($request->message));
       

        redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}