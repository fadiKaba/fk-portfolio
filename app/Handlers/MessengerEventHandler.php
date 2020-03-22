<?php

namespace App\Handlers;

use App\Events\MessengerEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MessengerEventHandler
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessengerEvent  $event
     * @return void
     */
    public function handle(MessengerEvent $event)
    {
        //
    }
}
