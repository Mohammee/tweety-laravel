<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }


        .content {
            text-align: center;
        }

        .title {
            font-size: 100px;
        }

        .links > a {
            color: #2e7c93;
            padding: 0 25px;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 10px;
        }

        .bottom-center {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 15px;
        }
    </style>
</head>
<body>

    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
               <img src="/image/logo.svg" alt="Tweety" width="300px">
            </div>

            <div class="links">
                @auth
                    <a href="{{ route('home') }}">Home</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">Login</a>
                    @endif
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth

            </div>

        </div>

    </div>
    <div class="bottom-center flex-center">
        <span>&copy;2021 <span style="color: green">Mohammad Sultan</span></span>
    </div>

</body>
</html>
