<?php

namespace App\Observers;

use Log;

class EventObserver
{

    public function updating( ) {

    }

    /**
     * Listen to the deletion of events and delete related known issues as well
     *
     * @param Event $event
     */
    public function deleting( ) {

    }

}