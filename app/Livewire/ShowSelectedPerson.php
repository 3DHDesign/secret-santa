<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\Player;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportNavigate\SupportNavigate;

class ShowSelectedPerson extends Component
{
    public $user;

    public $player_details;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
    }

    function mount()
    {
        $userSelect = GamePool::where('player_id', $this->user->id)->first();

        $this->player_details = Player::find($userSelect->guest_user);
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::guard('players')->logout();
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.show-selected-person');
    }
}
