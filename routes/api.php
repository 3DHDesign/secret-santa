<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\DivisionPlayersController;
use App\Http\Controllers\Api\PlayerGamePoolsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('divisions', DivisionController::class);

        // Division Players
        Route::get('/divisions/{division}/players', [
            DivisionPlayersController::class,
            'index',
        ])->name('divisions.players.index');
        Route::post('/divisions/{division}/players', [
            DivisionPlayersController::class,
            'store',
        ])->name('divisions.players.store');

        Route::apiResource('players', PlayerController::class);

        // Player Game Pools
        Route::get('/players/{player}/game-pools', [
            PlayerGamePoolsController::class,
            'index',
        ])->name('players.game-pools.index');
        Route::post('/players/{player}/game-pools', [
            PlayerGamePoolsController::class,
            'store',
        ])->name('players.game-pools.store');
    });
