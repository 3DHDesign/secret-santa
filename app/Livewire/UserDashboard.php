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
        $this->players = Player::where('id', '<>', $this->user->id)->select(['id'])->get();
    }

    public function render()
    {
        return view('livewire.user-dashboard');
    }
}
