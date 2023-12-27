<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Artistry</title>
        <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('images/makeupIcon.png') }}" type="image/png">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                margin: 0;
                line-height: inherit;
                background-color: #F4E9E3;
            }

            .centered-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            .button-container {
                display: flex;
                margin-top: 10px; /* Adjust the margin as needed */
            }

            .button-style {
                font-weight: bold;
                color: #000;
                text-decoration: none;
                margin-right: 20px;
                margin-left: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
            }

            .button-style:last-child {
                margin-right: 0; /* Remove margin for the last button */
            }

            .button-style:hover {
                color: white; /* Adjust the hover color if needed */
                background-color: #D4B998;
                padding: 20px;
            }

            .logo-container {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%; /* Ensure the container takes the full height */
            }

            .logo-container img {
                max-width: 100%; /* Ensure the image doesn't exceed the container width */
                max-height: 100%; /* Ensure the image doesn't exceed the container height */
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="centered-container bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <span class="button-style">Dashboard</span>
                    @else
                        <div class="button-container">
                            <a href="{{ route('login') }}" class="button-style">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button-style">Register</a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif

            <div class="logo-container">
                <img src="{{ asset('LOGO.JPG') }}" alt="Artistry Logo">
            </div>
        </div>
    </body>
</html>
