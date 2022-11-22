<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AKCILS</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/production.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        @vite('resources/css/app.css')
    </head>
    <body>
        <div id="container">
            <div class="p-4 mx-auto w-1/2">
                @include('includes.logo')
                <div class="text-center text-2xl text-white">@include('includes.messages')</div>
                <div id="loginBtnSection">
                    <h1 class="text-white text-xl text-center">Choose how you want to <br> Login </h1>
                    <!-- Button  -->
                    <div class="mt-10">
                        <div id="staffLoginBtn" class="login-btn">Staff Login</div>
                        <div id="studentLoginBtn" class="login-btn">Student Login</div>
                    </div>
                </div>

                <!-- Staff Login Section  -->
                <div id="staffLoginSection" class="login-div hidden">
                    <h1 class="text-xl text-center font-medium">Staff Login</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="staff_id" class="font-medium">Staff ID</label><br>
                            <input class="input-field" type="text" name="user_id" id="staff_id" placeholder="Enter Staff ID">
                        </div>
                        <div class="my-3">
                            <label for="password" class="font-medium">Password</label><br>
                            <input class="input-field" type="password" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="text-right text-green-600">
                            <span>Forgot Password</span>
                        </div>
                        <div class="my-3">
                            <input type="submit" value="Login" class="submit-btn">
                        </div>
                    </form>
                </div>

                <!-- Student Login Section  -->
                <div id="studentLoginSection" class="login-div hidden">
                    <h1 class="text-xl text-center font-medium">Student Login</h1>
                    <form action="{{ route('login-student') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="student_id" class="font-medium">Student ID</label><br>
                            <input class="input-field" type="text" name="user_id" id="student_id" placeholder="Enter Student ID">
                        </div>
                        <div class="my-3">
                            <label for="password" class="font-medium">Password</label><br>
                            <input class="input-field" type="password" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="text-right text-green-600">
                            <span>Forgot Password</span>
                        </div>
                        <div class="my-3">
                            <input type="submit" value="Login" class="submit-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/welcome.js') }}"></script>
    </body>
</html>
