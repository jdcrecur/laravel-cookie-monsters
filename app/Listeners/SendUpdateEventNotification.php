<?php

namespace App\Listeners;

use App\Events\EventUpdateEvent;
use App\Queries\UserQueries;


class SendUpdateEventNotification
{


    /**
     * Handle the event. Uses the node interface to send the new event to all subscribers
     *
     * @param EventUpdateEvent $event
     * @return void
     */
    public function handle(EventUpdateEvent $event)
    {

    }
}
