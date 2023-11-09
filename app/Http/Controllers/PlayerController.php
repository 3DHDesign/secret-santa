<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;

class PlayerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Player::class);

        $search = $request->get('search', '');

        $players = Player::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.players.index', compact('players', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Player::class);

        $divisions = Division::pluck('name', 'id');

        return view('app.players.create', compact('divisions'));
    }

    /**
     * @param \App\Http\Requests\PlayerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerStoreRequest $request)
    {
        $this->authorize('create', Player::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $player = Player::create($validated);

        return redirect()
            ->route('players.edit', $player)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Player $player)
    {
        $this->authorize('view', $player);

        return view('app.players.show', compact('player'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Player $player)
    {
        $this->authorize('update', $player);

        $divisions = Division::pluck('name', 'id');

        return view('app.players.edit', compact('player', 'divisions'));
    }

    /**
     * @param \App\Http\Requests\PlayerUpdateRequest $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        $this->authorize('update', $player);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $player->update($validated);

        return redirect()
            ->route('players.edit', $player)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Player $player)
    {
        $this->authorize('delete', $player);

        $player->delete();

        return redirect()
            ->route('players.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
