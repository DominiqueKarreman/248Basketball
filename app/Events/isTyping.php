<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class isTyping implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $username;
    public function __construct($username)
    {
        //
        $this->username = $username;
    }

    /**
    * Get the channels the event should broadcast on.
    *
    Illuminate\Broadcasting\Channel>
    */
    public function broadcastOn()
    {

        return new PresenceChannel('presence-chat.1');

    }

    public function broadcastAs(): string
    {
        return "isTyping";
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->username . " is typing...",
        ];
    }
}