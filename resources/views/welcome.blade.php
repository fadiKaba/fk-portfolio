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
                            <img src="{{asset('ico/logo.png')}}" width="60px">
                            <span class="pl-2">Green</span>
                        </h2>
                    </div>
                    <div class="col-md-4">
                        @auth
                            {{-- <a class="btn-main" href="{{ url('/home') }}"><img src="">Home</a> --}}
                        @else
                            <Mainlink :btn-name="same('Login')" :icon-path="same('{{asset('ico/login.svg')}}')" :btn-path="same('{{ route('login') }}')"></Mainlink>
                            @if (Route::has('register'))
                            <Mainlink :btn-name="same('Register')" :icon-path="same('{{asset('ico/register.svg')}}')" :btn-path="same('{{route('register')}}')"></Mainlink>
                            @endif
                        @endauth
                    </div>
                </div>
            @endif

            <div id="welcome-content">
                <div class="row px-md-5 pt-md-4 justify-content-center mx-2">
                    <div class="col-md-5 col1 px-5 pb-4 pt-3 mt-2">
                        <h1 class="text-center">GREEN <br> CONVERSATION</h1>
                        <p class="pb-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem praesentium reiciendis iure rerum suscipit 
                            maxime velit perspiciatis maiores magnam ullam ut odio, deserunt dicta culpa, cumque consequuntur, atque 
                        </p>                       
                    </div>
                    <div class="col-md-6 col2">
                        <Cyrcle :cyrcle-name="same('Start')" :cyrcle-path="same('/home')"></Cyrcle>
                    </div>
                </div>
            </div>
            <Foot></Foot>
        </div>
    </body>
</html>
