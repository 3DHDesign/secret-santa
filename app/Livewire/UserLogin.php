<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class UserLogin extends Component
{
    #[Rule('required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13|string')]
    public $number = '';

    #[Rule('required|max:20|min:4|string')]
    public $password = '';

    function login()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.user-login');
    }
}
