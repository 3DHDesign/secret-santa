<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SantaCard extends Component
{

    public $id;

    public $class;

    public $user;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
    }


    public function mount()
    {
        $isPlayerActive = GamePool::where('guest_user', $this->id)->exists();

        if ($isPlayerActive) {
            $this->class = 'off-class';
        } else {
            $this->class = 'show-class';
        }
    }

    function selected($id)
    {
        $player_details = Player::find($id)->exists();
        $isPlayerActive = GamePool::where('guest_user', $id)->exists();

        if ($player_details && !$isPlayerActive) {

            $isActive = GamePool::where('guest_user', $id)->exists();

            if (!$isActive) {
                GamePool::create([
                    'player_id' => $this->user->id,
                    'guest_user' => $id,
                ]);
                event(new \App\Events\GamePoolEvent($id));
                $this->redirect('game-end');
            } else {
                $this->redirect('start-game');
            }
        }
    }

    public function getListeners()
    {
        return [
            'echo:player.remove,.remove' => 'removePlayer',
        ];
    }

    public function removePlayer($playerId)
    {
        $this->mount();
    }


    public function render()
    {
        return view('livewire.santa-card');
    }
}
