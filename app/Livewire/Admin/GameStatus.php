<?php

namespace App\Livewire\Admin;

use App\Models\GamePool;
use App\Models\GuestUsers;
use App\Models\Player;
use Livewire\Component;

class GameStatus extends Component
{
    public $total_players;
    public $cards;
    public $remain_cards;

    function mount()
    {
        $this->total_players = Player::all()->count();
        $this->cards = GuestUsers::all()->count();
        $pool = GamePool::all()->count();
        $this->remain_cards = $this->cards - $pool;
    }

    public function render()
    {
        return view('livewire.admin.game-status');
    }
}
