<?php

namespace App\Listeners;

use App\Events\EventNewEvent;
use App\Queries\UserQueries;

class SendNewEventNotification
{


    /**
     * Handle the event. Uses the node interface to send the new event to all subscribers
     *
     * @param  EventNewEvent  $event
     * @return void
     */
    public function handle(EventNewEvent $event)
    {

    }
}
