<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Livewire\Livewire;

class SantaPlaygroundEvent
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
        $updatedPlayer = \App\Models\Player::find($event->id);

        // Update Livewire component with the updated data
        Livewire::emit('updatePlayerCard', [
            'id' => $updatedPlayer->id,
            // Include other properties you want to update in the Livewire component
        ]);
    }
}
