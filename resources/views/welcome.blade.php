<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- script -->
        <script src="{{ asset('js/app.js') }}" defer></script> 

    </head>
    <body class="welcome-body">
        <div class="" id="app">
            @if (Route::has('login'))
                <div class="d-flex justify-content-end">
                    @auth
                        <a class="btn-main" href="{{ url('/home') }}"><img src="">Home</a>
                    @else
                        <Mainbtn :btn-name="same('Login')" :icon-path="same('{{asset('./icons/login.svg')}}')" :btn-path="same('{{ route('login') }}')"></Mainbtn>
                        @if (Route::has('register'))
                        <Mainbtn :btn-name="same('Register')" :icon-path="same('{{asset('./icons/register.svg')}}')" :btn-path="same('{{route('register')}}')"></Mainbtn>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

            </div>
        </div>
    </body>
</html>
