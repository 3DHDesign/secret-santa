<table>
    <thead>
        <tr>
            <th>Selected Person</th>
            <th>Selected Person Division</th>

            <th>to</th>
            <th>Player Full Name</th>
            <th>Selected Person Division</th>
            <th>Player Mobile Number</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest->full_name }}</td>
                <td>{{ $guest->division->name }}</td>
                <td>to</td>
                @php
                    $player_details = App\Models\GamePool::where('guest_id', $guest->id)
                        ->with('player')
                        ->first();
                @endphp
                @if (!$player_details == '')
                    <td>{{ $player_details->player->full_name }}</td>
                    <td>{{ $player_details->player->division->name }}</td>
                    <td>{{ $player_details->player->number }}</td>
                @else
                    <td>NO</td>
                    <td>NO</td>
                    <td>NO</td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
