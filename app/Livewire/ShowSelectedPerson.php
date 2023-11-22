<?php

namespace App\Livewire;

use App\Models\GamePool;
use App\Models\GuestUsers;
use App\Models\Player;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Features\SupportNavigate\SupportNavigate;

class ShowSelectedPerson extends Component
{
    public $user;

    public $player_details;

    public $magicBoxClass;

    function __construct()
    {
        $this->user = Auth::guard('players')->user();
    }

    function mount()
    {
        $userSelect = GamePool::where('player_id', $this->user->id)->first();

        $this->player_details = GuestUsers::find($userSelect->guest_id);
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::guard('players')->logout();
        $this->redirect('/santa-login');
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

    public function render()
    {
        return view('livewire.show-selected-person');
    }
}
