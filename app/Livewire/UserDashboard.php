<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\On;

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
        $this->redirect('/');
    }

    function mount()
    {
        $this->fetchPlayers();
    }

    public function fetchPlayers()
    {
        $playerIds = Player::where('id', '<>', $this->user->id)->select(['id'])->get();

        $activePlayers = [];

        foreach ($playerIds as $playerId) {
            $isPlayerActive = GamePool::where('guest_user', $playerId->id)->exists();

            if (!$isPlayerActive) {
                $activePlayers[] = $playerId->id;
            }
        }

        $this->players = $activePlayers;
    }

    function selected($id)
    {
        $player_details = Player::find($id)->exists();

        if ($player_details) {

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
        } else {
            $this->redirect('start-game');
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
        $this->players = array_diff($this->players, [$playerId['id']]);
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
