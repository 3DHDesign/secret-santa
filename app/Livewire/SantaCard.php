<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SantaCard extends Component
{
    public $id;

    public $user;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
    }

    function selected()
    {
        $player_details = Player::find($this->id)->exists();

        if ($player_details) {

            $assign = GamePool::create([
                'player_id' => $this->user->id,
                'guest_user' => $this->id,
            ]);

            $playerId = $this->id;

            event(new \App\Events\SantaPlaygroundEvent($playerId));
            if ($assign->save()) {
                $this->emit('SantaPlaygroundEvent', $this->id);
                return $this->redirect('game-end', navigate: true);
            } else {
                return $this->redirect('start-game', navigate: true);
            }
        } else {
            return $this->redirect('start-game', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.santa-card');
    }
}
