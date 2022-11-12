<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard - AKCILS</title>
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-200">
        @yield('contents')
    </body>
</html>