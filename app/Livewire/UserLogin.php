<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserLogin extends Component
{
    #[Rule('required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13|string')]
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
            return redirect()->route('santa.dashboard');
        } else {
            $this->addError('loginError', 'Invalid credentials. Please check your number and password.');
        }
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
