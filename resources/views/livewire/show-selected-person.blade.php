<div class="container">
    <div class="preloader" wire:loading.flex wire:target="logout">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Logout..</p>
    </div>
    <div class="preloader magical-box {{ $magicBoxClass }}">
        <livewire:magical-statement />
    </div>
    <style>
        .login_wrapper {
            flex-direction: column;
        }

        .form-subheading {
            margin-top: 10px;
        }
    </style>
    <div class="login_wrapper">
        <div class="form-heading">{{ $player_details->full_name }}</div>
        <div class="form-subheading">Your selected <strong>{{ $player_details->full_name }}</strong>... <br> Division:
            {{ $player_details->division->name }}</div>
        <img class="santa-gift" src="{{ asset('assets/images/secret-gift.png') }}" alt="Secret Gift from santa"
            style="cursor: pointer" wire:click="magicalBox">
        <p class="form-bottom-link" style="color: rgb(26, 26, 26); text-center: center;">Please ensure that all the
            gifts are
            brought to the head office
            on or before December 8th.</i>
            <br>
        <p class="form-bottom-link" style="color: red"><strong>We Wish You a Merry Christmas</strong></i>
    </div>
    <p class="credit-footer"> Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
    <div class="logout-button" wire:click="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
    </div>
</div>
