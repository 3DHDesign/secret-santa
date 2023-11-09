@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="login_wrapper">
            <form action="" method="get">
                <img class="form-santa-logo" src="{{ asset('assets/images/secret santa logo.png') }}" alt="Santa Logo">
                <div class="form-heading">Entrance</div>
                <div class="form-subheading">Free entrance to secret santa</div>
                <div class="form-element">
                    <label for="number">Mobile Number</label>
                    <input type="text" name="number" placeholder="Mobile number">
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button class="submit-btn"><i class="fa-solid fa-ticket"></i>Entrance Pass</button>
            </form>
        </div>
        <p class="credit-footer">Secrete Santa | Design & Developed by <a href="https://3dhdesign.com">3DH Design</a></p>
    </div>
@endsection
