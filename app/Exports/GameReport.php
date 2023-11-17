<?php

namespace App\Exports;

use App\Models\GamePool;
use App\Models\GuestUsers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GameReport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.secretSanta', [
            'guests' => GuestUsers::all()
        ]);
    }
}
