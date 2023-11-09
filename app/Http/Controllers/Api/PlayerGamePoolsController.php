<?php

namespace App\Http\Controllers\Api;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GamePoolResource;
use App\Http\Resources\GamePoolCollection;

class PlayerGamePoolsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Player $player)
    {
        $this->authorize('view', $player);

        $search = $request->get('search', '');

        $gamePools = $player
            ->gamePools()
            ->search($search)
            ->latest()
            ->paginate();

        return new GamePoolCollection($gamePools);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Player $player)
    {
        $this->authorize('create', GamePool::class);

        $validated = $request->validate([
            'guest_user' => ['required', 'numeric'],
        ]);

        $gamePool = $player->gamePools()->create($validated);

        return new GamePoolResource($gamePool);
    }
}
