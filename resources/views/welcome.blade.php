<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>


        body {
            font-family: 'Figtree', sans-serif;
            background: url('https://wallpapercave.com/wp/wp1842878.jpg') center/cover no-repeat fixed;
            background-color: rgba(255, 255, 255, 0.01);
        }

        .landing-container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            padding: 2rem;
        }

        .landing-title {
            font-size: 2.5rem;
            font-weight: 900;
            color: #000;
            margin-bottom: 1rem;
        }

        .landing-description {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 2rem;
        }

        .landing-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            background-color: #4caf50;
            color: #fff;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .landing-button:hover {
            background-color: #45a049;
        }

        .auth-links {
            position: fixed;
            top: 0;
            right: 0;
            padding: 1rem;
            background-color: rgba(255, 255, 255, 0.3); /* Background color with less transparency */
        }

        .auth-links a {
            margin-left: 1rem;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .auth-links a:hover {
            color: #4caf50;
        }
    </style>
</head>
<body class="antialiased">
<div class="auth-links">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    @endif
</div>

<div class="landing-container">
    <div class="landing-title">Welcome to the Project Management System</div>
    <div class="landing-description">
        Simplify your project management with our powerful tools and features.
    </div>



    <a href="{{ route('register') }}" class="landing-button">Get Started</a>
</div>
</body>
</html>
