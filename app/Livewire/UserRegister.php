<?php

namespace App\Livewire;

use App\Models\Division;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserRegister extends Component
{
    #[Rule(
        'required|regex:/^\+\d{11}$/|unique:players|string',
        message: [
            'regex' => 'Please enter a valid phone number in the format: +947XXXXXXXX.',
            'required' => 'Please add your mobile number',
        ]
    )]
    public $number = '+94';

    #[Rule('required|max:30|min:4|string')]
    public $fullname = '';

    #[Rule('required|max:20|min:4|string')]
    public $password = '';

    #[Rule('required')]
    public $selectedDivision = '';


    public $divisions;

    function register()
    {
        $this->validate();

        $player = Player::create([
            'division_id' => $this->selectedDivision,
            'full_name' => $this->fullname,
            'number' => $this->number,
            'password' => Hash::make($this->password),
        ]);

        if ($player->save()) {
            $this->redirect('/login');
        } else {
            $this->addError('fullname', 'Something went wrong.. try again..');
        }
    }

    function mount()
    {
        $this->divisions = Division::select(['id', 'name'])->get();
    }

    public function render()
    {
        return view('livewire.user-register');
    }
}
