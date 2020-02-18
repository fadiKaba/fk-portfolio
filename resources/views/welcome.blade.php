<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('./css/app.css')}}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body class="welcome-body">
        <div class="">
            @if (Route::has('login'))
                <div class="d-flex justify-content-end">
                    @auth
                        <a class="btn btn-light m-1" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-light m-1" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-light m-1" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
            </div>
        </div>
    </body>
</html>
