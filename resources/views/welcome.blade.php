<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Jayusman Store</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        header {
            text-align: center;
            animation: fadeIn 1.5s ease;
        }

        header h1 {
            color: #ff6f00;
            font-size: 3rem;
            margin-bottom: 10px;
            animation: slideDown 1s ease;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: #e0e0e0;
            animation: fadeIn 2s ease;
        }

        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .button {
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            color: #fff;
            background-color: #ff6f00;
            transition: background-color 0.3s, transform 0.3s;
            animation: zoomIn 1.5s ease;
        }

        .button:hover {
            background-color: #e65c00;
            transform: scale(1.1);
        }

        .button:active {
            transform: scale(0.95);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .logo {
            width: 300px;
            height: 300px;
            margin: 0 auto 20px;
            background-image: url('images/js.png');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            animation: rotateIn 1.5s ease;
        }

        @keyframes rotateIn {
            from {
                transform: rotate(-360deg);
                opacity: 0;
            }
            to {
                transform: rotate(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="logo"></div>
    <h1>Welcome to Jayusman Store</h1>
    <p>Your gateway to the best online shopping experience.</p>
    <div class="button-container">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="button">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="button">Register</a>
                @endif
            @endauth
        @endif
    </div>
</header>

</body>
</html>
