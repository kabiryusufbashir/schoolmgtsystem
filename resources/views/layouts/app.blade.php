<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AKCILS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @vite('resources/css/app.css')
    </head>
    <body>
        <div id="container">
            <div class="p-4 mx-auto w-1/2">
                @include('includes.logo')
                <h1 class="text-white text-xl text-center">
                    Choose how you want to <br> Login 
                </h1>
                <!-- Button  -->
                <div class="mt-10">
                    <div class="login-btn">Staff Login</div>
                    <div class="login-btn">Student Login</div>
                </div>
            </div>
        </div>
    </body>
</html>
