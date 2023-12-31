<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo Partner</title>

    <!-- Fonts -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @yield('icons')

    @yield('custom-styles')

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('partials._navbar')

        <main class="animation-container">
            <div class="container">
                <div class="container mt-4">
                    @yield('content')

                </div>
            </div>
        </main>
    </div>
    @yield('script')
</body>

</html>
