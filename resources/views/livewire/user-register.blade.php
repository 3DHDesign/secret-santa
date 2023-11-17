<div class="container">
    <div class="preloader" wire:loading.flex wire:target="register">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="login_wrapper">
        <form wire:submit.prevent="register">
            <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}" alt="Santa Logo">
            <div class="form-heading">Get Ready</div>
            <div class="form-subheading">Get your key to enter the santa world</div>
            <div class="form-element">
                <label for="fullname">Full Name</label>
                <input type="text" wire:model.live="fullname" placeholder="Full Name">
                @error('fullname')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <div class="form-element">
                <label for="division">Select Division</label>
                <select wire:model.live="selectedDivision" id="division">
                    <option value="">Select Your Division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
                @error('division')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <div class="form-element">
                <label for="number">Mobile Number</label>
                <input type="text" wire:model.live="number" placeholder="Mobile number">
                @error('number')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="text" wire:model.live="email" placeholder="Email">
                @error('email')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" wire:model.live="password" placeholder="Password">
                @error('password')
                    <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                @enderror
            </div>
            <button class="submit-btn"><i class="fa-solid fa-ticket"></i>Grab your key</button>
            <p class="form-bottom-link">I Already have a pass > <a wire:navigate
                    href="{{ route('santa.login') }}">Entrance
                </a><i class="fa-solid fa-right-to-bracket"></i>
        </form>
    </div>
    <p class="credit-footer">Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
</div>
