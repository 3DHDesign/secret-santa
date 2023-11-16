<div class="container">
    <div class="preloader" wire:loading.flex wire:target="resetPassword">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="preloader" wire:loading.flex wire:target="submitVerification">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="preloader" wire:loading.flex wire:target="updatePassword">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="login_wrapper">
        @if ($verify == false)
            <form wire:submit.prevent="resetPassword">
                <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}" alt="Santa Logo">
                <div class="form-heading">Password Reset</div>
                <div class="form-subheading">Reset your password</div>
                <div class="form-element">
                    <label for="email">Your Email</label>
                    <input type="text" wire:model.live="email" placeholder="Email"
                        class="@error('email') invalid-input @enderror">
                    @error('email')
                        <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                    @enderror
                </div>
                <button class="submit-btn"><i class="fa-solid fa-paper-plane"></i>Send Verify Code</button>
                <p class="form-bottom-link">
                    <a wire:navigate href="{{ route('santa.login') }}">
                        < Go to login </a>
                </p>
            </form>
        @else
            @if (!$passwordBox)
                <form wire:submit.prevent="submitVerification">
                    <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}"
                        alt="Santa Logo">
                    <div class="form-heading">Verification Code</div>
                    <div class="form-subheading">Enter your verification code</div>
                    <div class="form-element">
                        <label for="email">Verification Code</label>
                        <input type="text" wire:model.live="code" placeholder="Verification code"
                            class="@error('code') invalid-input @enderror">
                        @error('code')
                            <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                        @enderror
                    </div>
                    <button class="submit-btn"><i class="fa-solid fa-paper-plane"></i>Submit</button>
                    <p class="form-bottom-link">
                        <a wire:navigate href="{{ route('santa.login') }}">
                            < Go to login </a>
                    </p>
                    <p style="color: black; text-align:center;">Your verifivation code is sent to: <strong>
                            {{ $email }}</strong></p>
                </form>
            @else
                <form wire:submit.prevent="updatePassword">
                    <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}"
                        alt="Santa Logo">
                    <div class="form-heading">Enter New Password</div>
                    <div class="form-subheading">Enter your new password</div>
                    <div class="form-element">
                        <label for="newPassword">New Password</label>
                        <input type="text" wire:model.live="newPassword" placeholder="New Password"
                            class="@error('newPassword') invalid-input @enderror">
                        @error('newPassword')
                            <span class="error">From Santa: {{ $message }} <i class="fa-solid fa-bomb"></i></span>
                        @enderror
                    </div>
                    <button class="submit-btn"><i class="fa-solid fa-paper-plane"></i>Update Password</button>
                    <p class="form-bottom-link">
                        <a wire:navigate href="{{ route('santa.login') }}">
                            < Go to login </a>
                    </p>
                </form>
            @endif
        @endif
    </div>
    <p class="credit-footer">Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
</div>
