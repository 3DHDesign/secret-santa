<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title>Secret Santa | 3DH</title>
    @livewireStyles
</head>

<body>

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

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(window).on("load", function() {
            $('.preloader').fadeOut('slow');
        });
    </script> --}}

</body>

</html>
