<?php

namespace App\Livewire;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserRegister extends Component
{
    #[Rule('required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:players|string')]
    public $number = '';

    #[Rule('required|max:30|min:4|string')]
    public $fullname = '';

    #[Rule('required|max:20|min:4|string')]
    public $password = '';

    function register()
    {
        $this->validate();

        $player = Player::create([
            'fullname' => $this->fullname,
            'number' => $this->number,
            'password' => $this->password,
        ]);

        Auth::login($player);

        $player->save();
    }

    public function render()
    {
        return view('livewire.user-register');
    }
}