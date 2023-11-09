<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\FrontEndController;
use App\Livewire\ShowSelectedPerson;
use App\Livewire\UserDashboard;
use App\Livewire\UserLogin;
use App\Livewire\UserRegister;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', UserLogin::class)->name('santa.login');
Route::get('/get-key', UserRegister::class)->name('santa.register');
Route::get('/start-game', UserDashboard::class)->name('santa.dashboard');
Route::get('/game-end', ShowSelectedPerson::class)->name('santa.end');


Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

Route::prefix('/')
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::resource('divisions', DivisionController::class);
        Route::resource('players', PlayerController::class);
    });
