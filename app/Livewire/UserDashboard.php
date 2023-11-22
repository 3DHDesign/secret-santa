<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\GuestUsers;
use App\Models\Player;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\On;

class UserDashboard extends Component
{
    public $players;
    public $user;
    public $game_status;
    public $magicBoxClass;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
        $game = Setting::find(1);
        $this->game_status = $game->game_status;
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::guard('players')->logout();
        $this->redirect('/santa-login');
    }

    function mount()
    {
        if ($this->game_status == 1) {
            $this->fetchPlayers();
        }
    }

    public function magicalBox()
    {
        $this->magicBoxClass = 'display-flex';
    }

    #[On('close-box')]
    public function removeMagicalBox()
    {
        $this->magicBoxClass = '';
    }

    public function fetchPlayers()
    {
        $this->players = GuestUsers::select(['id'])->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
