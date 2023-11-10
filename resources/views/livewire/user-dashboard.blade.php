<div class="container-dashboard">
    <div class="preloader" wire:offline.flex>
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Your connection unstable..</p>
    </div>
    <div class="preloader" wire:loading.flex wire:target="logout">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Logout..</p>
    </div>
    <div class="santas-wrapper">

        @foreach ($players as $collection)
            @foreach ($collection as $player)
                <div class="player-info">
                    <livewire:santa-card :id="$player->id" />
                </div>
            @endforeach
        @endforeach

    </div>

    <div class="logout-button" wire:click="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
    </div>


    <style>
        .floating-santa,
        .moon,
        .dh-office {
            display: none
        }
    </style>
    <script>
        document.addEventListener('livewire:load', function() {
            window.Echo.channel('santa-playground-channel')
                .listen('SantaPlaygroundEvent', (event) => {
                    Livewire.emit('santaCardSelected', event.playerId);
                });
        });
    </script>
</div>
