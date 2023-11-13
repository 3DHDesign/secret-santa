<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SantaCard extends Component
{
    #[Reactive] 
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

            $isActive = GamePool::where('guest_user', $this->id)->exists();

            if (!$isActive) {
                // GamePool::create([
                //     'player_id' => $this->user->id,
                //     'guest_user' => $this->id,
                // ]);
                // return $this->redirect('game-end', navigate: true);
                event(new \App\Events\GamePoolEvent($this->id));
                // $this->dispatch('post-created', title: $this->id);
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
