<table>
    <thead>
        <tr>
            <th>Player Full Name</th>
            <th>to</th>
            <th>Selected Person</th>
            <th>Player Mobile Number</th>
            <th>Selected Person Division</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest->full_name }}</td>
                <td>to</td>
                @php
                    $player_details = App\Models\GamePool::where('guest_id', $guest->id)
                        ->with('player')
                        ->first();
                @endphp
                @if (!$player_details == '')
                    <td>{{ $player_details->player->full_name }}</td>
                    <td>{{ $player_details->player->number }}</td>
                    <td>{{ $player_details->player->division->name }}</td>
                @else
                    <td>NO</td>
                    <td>NO</td>
                    <td>NO</td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
