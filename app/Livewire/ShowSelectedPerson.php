<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowSelectedPerson extends Component
{
    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::guard('players')->logout();
        return redirect()->route('santa.login');
    }

    public function render()
    {
        return view('livewire.show-selected-person');
    }
}
