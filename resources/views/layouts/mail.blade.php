<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GrowUp') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Scripts -->
    @vite([
        'resources/assets/img/favicon/favicon.ico', 
        'resources/assets/vendor/js/helpers.js',
        'resources/assets/js/config.js'
    ])

    <link rel="stylesheet" href={{ Vite::asset('resources/assets/vendor/fonts/boxicons.css') }}></link>
    <link rel="stylesheet" href={{ Vite::asset('resources/assets/vendor/css/core.css') }}></link>
    <link rel="stylesheet" href={{ Vite::asset('resources/assets/vendor/css/theme-default.css') }}></link>
    <link rel="stylesheet" href={{ Vite::asset('resources/assets/css/demo.css') }}></link>
    <link rel="stylesheet" href={{ Vite::asset('resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}></link>
    <link rel="stylesheet" href={{ Vite::asset('resources/assets/vendor/libs/apex-charts/apex-charts.css') }}></link>
</head>
<body>


    </body>
</html>
@vite([
        'resources/assets/vendor/libs/jquery/jquery.js', 
        'resources/assets/vendor/libs/popper/popper.js', 
        'resources/assets/vendor/js/bootstrap.js', 
        'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js', 
        'resources/assets/vendor/js/menu.js', 
        'resources/assets/vendor/libs/apex-charts/apexcharts.js', 
        'resources/assets/js/main.js', 
        //'resources/assets/js/dashboards-analytics.js',
    ])
@vite('resources/assets/js/dashboards-analytics.js')