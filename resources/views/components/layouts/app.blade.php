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
    <title>Collect gifts from your secret Santa! | 3DH</title>
    <meta name="description"
        content="Join the festive fun with 3DH International Group's Secret Santa mini-game app! Spread joy and surprises among your group as you exchange secret gifts seamlessly through our interactive and delightful platform. Experience the thrill of giving anonymously and celebrating the holiday spirit together!">
    <meta name="keywords" content="Secret Santa, Mini-Game, Holiday Game, Virtual Gifts, Festive Fun, Christmas Game">
    <meta name="author" content="Your Company Name">
    <meta name="robots" content="index, follow">

    <!-- Open Graph (Facebook, etc.) -->
    <meta property="og:title" content="Collect gifts from your secret Santa! | 3DH">
    <meta property="og:description"
        content="Join the festive fun with 3DH International Group's Secret Santa mini-game app! Spread joy and surprises among your group as you exchange secret gifts seamlessly through our interactive and delightful platform. Experience the thrill of giving anonymously and celebrating the holiday spirit together!">
    <meta property="og:image" content="URL to an image representing your Secret Santa Mini-Game">
    <meta property="og:url" content="URL of the game page">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Collect gifts from your secret Santa! | 3DH">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $('#close-btn').on('click', function() {
                $('.magical-box').removeClass('display-flex');
            });
        });
    </script>

</body>

</html>
