<?php

namespace App\Listeners;

use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GamePoolListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $playerId = $event->playerId;

        event(new BroadcastEvent('player-remove', ['playerId' => $playerId]));
    }
}
