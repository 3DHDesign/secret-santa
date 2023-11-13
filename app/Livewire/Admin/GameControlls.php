<?php

namespace App\Livewire\Admin;

use App\Exports\GameReport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GameControlls extends Component
{
    function pauseGame()
    {
        sleep(10);
    }

    function resetGame()
    {
        sleep(3);
    }

    function downloadReport()
    {
        return Excel::download(new GameReport, 'secret-santa-report.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.game-controlls');
    }
}
