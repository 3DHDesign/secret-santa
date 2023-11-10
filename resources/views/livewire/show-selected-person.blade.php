<div class="container">
    <div class="preloader" wire:loading.flex wire:target="logout">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Logout..</p>
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
        <div class="form-heading">Tharuka Idushan</div>
        <div class="form-subheading">Your selected <strong>Tharuka Idushan</strong>... <br> Division: 3DH Design</div>
        <img class="santa-gift" src="{{ asset('assets/images/secret-gift.png') }}" alt="Secret Gift from santa">
        <p class="form-bottom-link" style="color: red">We Wish You a Merry Christmas</i>
    </div>
    <p class="credit-footer">Secret Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
    <div class="logout-button" wire:click="logout">
        <i class="fa-solid fa-right-from-bracket"></i>
    </div>
</div>
