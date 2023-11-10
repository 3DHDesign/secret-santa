<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class UserDashboard extends Component
{
    public $players;
    public $user;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::guard('players')->logout();
        return $this->redirect('/', navigate: true);
    }

    function mount()
    {
        $playerIds = Player::where('id', '<>', $this->user->id)->select(['id'])->get();

        $activePlayers = [];

        foreach ($playerIds as $playerId) {
            $isPlayerActive = GamePool::where('guest_user', $playerId->id)->exists();

            if (!$isPlayerActive) {
                $player = Player::where('id', $playerId->id)->select(['id'])->get();
                if ($player) {
                    $activePlayers[] = $player;
                }
            }
        }

        $this->players = $activePlayers;
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
