<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserLogin extends Component
{
    #[Rule('required|regex:/^\+\d{11}$/|unique:players|string',  message: 'Please enter a valid phone number in the format +947XXXXXXXX.')]
    public $number = '';

    #[Rule('required|max:20|min:4|string')]
    public $password = '';

    public function login()
    {
        $this->validate();

        $credentials = [
            'number' => $this->number,
            'password' => $this->password,
        ];

        if (Auth::guard('players')->attempt($credentials)) {
            return $this->redirect('/start-game', navigate: true);
        } else {
            $this->addError('number', 'Invalid credentials. Please check your number and password.');
        }
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
