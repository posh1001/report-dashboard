<?php

namespace App\Events;

use App\Models\PostProgram;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class PostProgramCreated implements ShouldBroadcast
{
    use SerializesModels;

    public $id;
    public $title;
    public $created_at;

    /**
     * Create a new event instance.
     */
    public function __construct(PostProgram $postProgram)
    {
        // Only send the minimal data needed for the frontend
        $this->id = $postProgram->id;
        $this->title = $postProgram->title ?? 'New Report';
        $this->created_at = $postProgram->created_at->toDateTimeString();
    }

    /**
     * The channel the event should broadcast on.
     * Using a private channel for the authenticated user.
     */
    public function broadcastOn()
    {
        // Replace 'user.1' with the actual authenticated user ID dynamically in broadcasting
        return new PrivateChannel('notifications.' . auth()->id());
    }

    /**
     * Event name for frontend listeners.
     */
    public function broadcastAs()
    {
        return 'PostProgramCreated';
    }
}
