<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\GuestUsers;
use Illuminate\Http\Request;
use App\Http\Requests\GuestUsersStoreRequest;
use App\Http\Requests\GuestUsersUpdateRequest;

class GuestUsersController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', GuestUsers::class);

        $search = $request->get('search', '');

        $allGuestUsers = GuestUsers::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_guest_users.index',
            compact('allGuestUsers', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', GuestUsers::class);

        $divisions = Division::pluck('name', 'id');

        return view('app.all_guest_users.create', compact('divisions'));
    }

    /**
     * @param \App\Http\Requests\GuestUsersStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuestUsersStoreRequest $request)
    {
        $this->authorize('create', GuestUsers::class);

        $validated = $request->validated();

        $guestUsers = GuestUsers::create($validated);

        return redirect()
            ->route('all-guest-users.edit', $guestUsers)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GuestUsers $guestUsers
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GuestUsers $guestUsers)
    {
        $this->authorize('view', $guestUsers);

        return view('app.all_guest_users.show', compact('guestUsers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GuestUsers $guestUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GuestUsers $guestUsers)
    {
        $this->authorize('update', $guestUsers);

        $divisions = Division::pluck('name', 'id');

        return view(
            'app.all_guest_users.edit',
            compact('guestUsers', 'divisions')
        );
    }

    /**
     * @param \App\Http\Requests\GuestUsersUpdateRequest $request
     * @param \App\Models\GuestUsers $guestUsers
     * @return \Illuminate\Http\Response
     */
    public function update(
        GuestUsersUpdateRequest $request,
        GuestUsers $guestUsers
    ) {
        $this->authorize('update', $guestUsers);

        $validated = $request->validated();

        $guestUsers->update($validated);

        return redirect()
            ->route('all-guest-users.edit', $guestUsers)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GuestUsers $guestUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, GuestUsers $guestUsers)
    {
        $this->authorize('delete', $guestUsers);

        $guestUsers->delete();

        return redirect()
            ->route('all-guest-users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
