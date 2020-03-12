<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Acme|Oswald:400,500&display=swap" rel="stylesheet">

        <!-- script -->
        <script src="{{ asset('js/app.js') }}" defer></script> 

    </head>
    <body class="welcome-body">
        <div id="app">
            @if (Route::has('login'))
                <div class="container-fluid row mx-auto py-2 welcome-nav">
                    <div class="col-md-8">
                        <h2 class="intro m-0">
                            <img src="{{asset('icons/logo.png')}}" width="60px">
                            Be a part of our conversation 
                        </h2>
                    </div>
                    <div class="col-md-4">
                        @auth
                            {{-- <a class="btn-main" href="{{ url('/home') }}"><img src="">Home</a> --}}
                        @else
                            <Mainlink :btn-name="same('Login')" :icon-path="same('{{asset('./icons/login.svg')}}')" :btn-path="same('{{ route('login') }}')"></Mainlink>
                            @if (Route::has('register'))
                            <Mainlink :btn-name="same('Register')" :icon-path="same('{{asset('./icons/register.svg')}}')" :btn-path="same('{{route('register')}}')"></Mainlink>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif

            <div class="content">
                 <Cyrcle :cyrcle-name="same('Start')" :cyrcle-path="same('/home')"></Cyrcle>
            </div>
            <Foot></Foot>
        </div>
    </body>
</html>
