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
    <meta name="description"
        content="Join the holiday fun with our Secret Santa Mini-Game! Experience joy, surprises, and festive cheer as you exchange virtual gifts with friends.">
    <meta name="keywords" content="Secret Santa, Mini-Game, Holiday Game, Virtual Gifts, Festive Fun, Christmas Game">

    <meta name="author" content="Your Company Name">
    <meta name="robots" content="index, follow">



    <meta property="og:title" content="Secret Santa Mini-Game | Holiday Fun">
    <meta property="og:description"
        content="Join the holiday fun with our Secret Santa Mini-Game! Experience joy, surprises, and festive cheer as you exchange virtual gifts with friends.">
    <meta property="og:image" content="URL to an image representing your Secret Santa Mini-Game">
    <meta property="og:url" content="URL of the game page">


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Secret Santa Mini-Game">
    @vite(['resources/js/app.js'])
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

</body>

</html>
