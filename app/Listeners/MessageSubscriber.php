<?php

namespace App\Listeners;

use App\Events\MessageCreated;
use Illuminate\Events\Dispatcher;

/**
 * Created by IntelliJ IDEA.
 * User: omar-
 * Date: 17/04/2017
 * Time: 19:52
 */
class MessageSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param  Dispatcher  $events
     */
    public function subscribe($events) {

        $events->listen(MessageCreated::class, [$this, 'onMessageCreated']);

    }

    /**
     * @param MessageCreated $event
     */
    public function onMessageCreated(MessageCreated $event) {
        \Log::info("A new message has been posted : {$event->message}");
    }
}