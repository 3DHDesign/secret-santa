<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserLogin extends Component
{
    #[Rule(
        'required|regex:/^\+\d{11}$/|string',
        message: [
            'regex' => 'Please enter a valid phone number in the format: +947XXXXXXXX.',
            'required' => 'Please add your mobile number',
        ]
    )]
    public $number = '+94';

    #[Rule('required|max:20|min:4|string')]
    public $password = '';

    public $magicBoxClass;

    public function login()
    {
        $this->validate();

        $credentials = [
            'number' => $this->number,
            'password' => $this->password,
        ];

        if (Auth::guard('players')->attempt($credentials)) {
            $this->redirect('/start-game');
        } else {
            $this->addError('number', 'Invalid credentials. Please check your number and password.');
        }
    }

    public function mount()
    {
    }

    public function magicalBox()
    {
        $this->magicBoxClass = 'display-flex';
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
