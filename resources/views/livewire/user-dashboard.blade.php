<div class="container-dashboard">
    <div class="preloader" wire:offline.flex>
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Your connection unstable..</p>
    </div>
    <div class="preloader" wire:loading.flex wire:target="logout">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Logout..</p>
    </div>
    <div class="preloader" wire:loading.flex>
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Santa is choosing your partner...</p>
    </div>
    <div class="preloader magical-box {{ $magicBoxClass }}">
        <livewire:magical-statement />

    </div>
    <div class="santas-wrapper">

        @if ($players)
            @foreach ($players as $player)
                <livewire:santa-card :id="$player->id" :key="$player->id" />
            @endforeach
        @else
            <p style="text-align: center; color: white;"> Waiting for other players ....</p>
        @endif

    </div>

    <div class="santa-button" wire:click="magicalBox">
        <i class="fa-solid fa-gift"></i>
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
