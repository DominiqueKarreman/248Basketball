<?php

namespace App\Http\Controllers\Api;

use App\Models\ChatMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatMessageRequest;
use App\Http\Requests\UpdateChatMessageRequest;

class ApiChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
     $user = Auth()->user();
        $messages = ChatMessage::where('from_user', $user->id)->orWhere('to_user', $user->id)->get();
        return response()->json($messages);
    }
    public function withUser($withUser){
        $userId = Auth()->user()->id;
        $messages = ChatMessage::where(function($query) use ($userId, $withUser) {
            $query->where('from_user', $userId)
                  ->where('to_user', $withUser);
        })->orWhere(function($query) use ($userId, $withUser) {
            $query->where('from_user', $withUser)
                  ->where('to_user', $userId);
        })->orderBy('created_at', 'desc')->get();
        return response()->json($messages);
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
    public function store(StoreChatMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatMessageRequest $request, ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatMessage $chatMessage)
    {
        //
    }
}
