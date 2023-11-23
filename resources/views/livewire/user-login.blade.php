<div class="container">
    <div class="preloader" wire:loading.flex wire:target="login">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="preloader magical-box {{ $magicBoxClass }}">
        <livewire:magical-statement />

    </div>
    <div class="login_wrapper">
        <form wire:submit.prevent="login">
            <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}" alt="Santa Logo"
                wire:click="magicalBox">
            <div class="form-heading">Entrance</div>
            <div class="form-subheading">Entrance to secret santa</div>
            <div class="form-element">
                <label for="number">Mobile Number</label>
                <input type="text" wire:model.live="number" placeholder="Mobile number"
                    class="@error('number') invalid-input @enderror">
                @error('number')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" wire:model.live="password" placeholder="Password"
                    class="@error('password') invalid-input @enderror">
                @error('password')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <button class="submit-btn"><i class="fa-solid fa-ticket"></i>ENTER NOW</button>
            <p class="form-bottom-link">I forgot my password > <a wire:navigate href="{{ route('santa.reset') }}">Reset
                    now
                </a><i class="fa-solid fa-key"></i>
            </p>
        </form>

    </div>
    <p class="credit-footer">Please ensure that all the gifts are brought to the head office on or before December 8th.</p>
    <p class="credit-footer">Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
</div>
