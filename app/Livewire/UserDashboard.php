<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class UserDashboard extends Component
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
        return view('livewire.user-dashboard');
    }
}
