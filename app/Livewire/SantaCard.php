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
        $isPlayerActive = GamePool::where('guest_id', $this->id)->exists();

        if ($isPlayerActive) {
            $this->class = 'off-class';
        } else {
            $this->class = 'show-class';
        }
    }

    function selected($id)
    {
        $this->dispatch('sanata-choose', id: $id);
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
