<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GuestUsersController;
use App\Livewire\ForgotPassword;
use App\Livewire\ShowSelectedPerson;
use App\Livewire\UserDashboard;
use App\Livewire\UserLogin;
use App\Livewire\UserRegister;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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






Route::middleware(['santa.auth'])->group(function () {
    Route::get('/start-game', UserDashboard::class)->middleware('santa.check')->name('santa.dashboard');
    Route::get('/game-end', ShowSelectedPerson::class)->name('santa.end');
});

Route::middleware(['santa.login.auth'])->group(function () {
    Route::get('/santa-login', UserLogin::class)->name('santa.login');
    Route::get('/password-reset', ForgotPassword::class)->name('santa.reset');
    Route::get('/', UserRegister::class)->name('santa.register');
});

Route::get('/cls', function () {
    Artisan::call('optimize:clear');
});

Route::get('/ws', function () {
    Artisan::call('websockets:serve');
});

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
        Route::get('all-guest-users', [
            GuestUsersController::class,
            'index',
        ])->name('all-guest-users.index');
        Route::post('all-guest-users', [
            GuestUsersController::class,
            'store',
        ])->name('all-guest-users.store');
        Route::get('all-guest-users/create', [
            GuestUsersController::class,
            'create',
        ])->name('all-guest-users.create');
        Route::get('all-guest-users/{guestUsers}', [
            GuestUsersController::class,
            'show',
        ])->name('all-guest-users.show');
        Route::get('all-guest-users/{guestUsers}/edit', [
            GuestUsersController::class,
            'edit',
        ])->name('all-guest-users.edit');
        Route::put('all-guest-users/{guestUsers}', [
            GuestUsersController::class,
            'update',
        ])->name('all-guest-users.update');
        Route::delete('all-guest-users/{guestUsers}', [
            GuestUsersController::class,
            'destroy',
        ])->name('all-guest-users.destroy');
    });
