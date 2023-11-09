<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Secret Santa | 3DH</title>
    @livewireStyles
</head>

<body>
    <div class="preloader">
        <img src="{{ asset('assets/images/secret santa logo.png') }}" alt="secret santa loader">
        <p>Loading ...</p>
    </div>
    <div class="snowflake">
        ❅
    </div>
    <div class="snowflake">
        ❅
    </div>
    <div class="snowflake">
        ❆
    </div>
    <div class="snowflake">
        ❄
    </div>
    <div class="snowflake">
        ❅
    </div>
    <div class="snowflake">
        ❆
    </div>
    <div class="snowflake">
        ❄
    </div>
    <div class="snowflake">
        ❅
    </div>
    <div class="snowflake">
        ❆
    </div>
    <div class="snowflake">
        ❄
    </div>

    {{ $slot }}


    <img class="floating-santa" src="{{ asset('assets/images/santa-with-baloon.png') }}" alt="Santa floating">
    <img class="moon" src="{{ asset('assets/images/moon.png') }}" alt="Moon">
    <img class="dh-office" src="{{ asset('assets/images/3dh-house.png') }}" alt="3dh-office">

    @livewireScripts

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(window).load(function() {
            $('.preloader').fadeOut('slow');
        });
    </script>

</body>

</html>
