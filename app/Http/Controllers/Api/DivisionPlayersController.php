<?php

namespace App\Http\Controllers\Api;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerCollection;

class DivisionPlayersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Division $division)
    {
        $this->authorize('view', $division);

        $search = $request->get('search', '');

        $players = $division
            ->players()
            ->search($search)
            ->latest()
            ->paginate();

        return new PlayerCollection($players);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Division $division
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Division $division)
    {
        $this->authorize('create', Player::class);

        $validated = $request->validate([
            'full_name' => ['required', 'max:255', 'string'],
            'number' => ['required', 'max:255', 'string'],
            'password' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $player = $division->players()->create($validated);

        return new PlayerResource($player);
    }
}
