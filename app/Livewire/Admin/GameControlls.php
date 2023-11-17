<?php

namespace App\Livewire\Admin;

use App\Exports\GameReport;
use App\Models\Setting;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GameControlls extends Component
{
    public $game_status;

    public $event;

    function __construct()
    {
        $game = Setting::find(1);
        $this->game_status = $game->game_status;
    }

    function mount()
    {
        return $this->statusHadle();
    }

    public function pauseGame()
    {
        $currentGame = Setting::find(1);
        $currentGame->game_status = 0;
        $currentGame->save();
        $this->statusHadle();
        return $this->redirect('/dashboard');
    }
    public function startGame()
    {
        $currentGame = Setting::find(1);
        $currentGame->game_status = 1;
        $currentGame->save();
        $this->statusHadle();
        return $this->redirect('/dashboard');
    }

    public function statusHadle()
    {
        if ($this->game_status == 0) {
            return $this->event = 'Start';
        } else {
            return $this->event = 'Pause';
        }
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
