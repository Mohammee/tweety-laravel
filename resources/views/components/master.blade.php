<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css?v=').time() }}" rel="stylesheet">
</head>
<body>

<div id="app">

    <div class="px-8 py-5 mb-4">
        <div class="container mx-auto">
            <h1>
                <img src="/image/logo.svg" alt="Tweety">
            </h1>
        </div>
    </div>
    {{ $slot }}
</div>

<script src="http://unpkg.com/turbolinks"></script>

<script src="{{asset('js/myapp.js')}}"></script>

</body>
</html>
