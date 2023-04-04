<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class chatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $message;
    public function __construct($message)
    {
        //
        $this->message = $message;
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
        return "chatMessage";
    }

    public function broadcastWith(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}