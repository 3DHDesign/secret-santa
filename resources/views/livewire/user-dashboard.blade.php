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

        @foreach ($players as $player)
            <div class="player-info">
                <div class="santa-card" wire:click="selected({{ $player }})">
                    <div class="card-number">
                        <span>Select Me</span>
                    </div>
                    <img class="santa-image" src="{{ asset('assets/images/card/card-avatar.png') }}" alt="Santa Avatar">
                </div>

            </div>
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


</div>
