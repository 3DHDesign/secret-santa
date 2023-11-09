<div class="container">
    <div class="login_wrapper">
        <form action="{{ route('santa.dashboard') }}">
            <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}" alt="Santa Logo">
            <div class="form-heading">Get Ready</div>
            <div class="form-subheading">Get your key to enter the santa world</div>
            <div class="form-element">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" placeholder="Full Name">
            </div>
            <div class="form-element">
                <label for="number">Mobile Number</label>
                <input type="text" name="number" placeholder="Mobile number">
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button class="submit-btn"><i class="fa-solid fa-ticket"></i>Grab your key</button>
            <p class="form-bottom-link">I Already have a pass > <a wire:navigate
                    href="{{ route('santa.login') }}">Entrance
                </a><i class="fa-solid fa-right-to-bracket"></i>
        </form>
    </div>
    <p class="credit-footer">Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
</div>
