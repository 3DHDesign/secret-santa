<table>
    <thead>
        <tr>
            <th>Player Full Name</th>
            <th>Player Division</th>
            <th>Player Mobile Number</th>
            <th>Selected Person</th>
            <th>Selected Person Mobile Number</th>
            <th>Selected Person Division</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($games as $status)
            <tr>
                <td>{{ $status->player->full_name }}</td>
                <td>{{ $status->player->division->name }}</td>
                <td>{{ $status->player->number }}</td>
                @php
                    $guest_player_details = App\Models\Player::find($status->guest_user);
                @endphp
                <td>{{ $guest_player_details->full_name }}</td>
                <td>{{ $guest_player_details->number }}</td>
                <td>{{ $guest_player_details->division->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
