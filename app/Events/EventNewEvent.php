<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventNewEvent
{
    use InteractsWithSockets, SerializesModels;

    public $event;
    public $user_emails;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event, $user_emails)
    {
        $this->event = $event;
        $this->user_emails = $user_emails;
    }
}
