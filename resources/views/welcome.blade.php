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
                        <a class="btn-main" href="{{ url('/home') }}"><img src="">Home</a>
                    @else
                        <a class="btn-main" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                <a class="btn-main" href="{{ route('register') }}">
                    <div>
                        <div>
                            <img src="{{asset('./icons/register.svg')}}">
                        </div>
                        <div>
                            <span>Register</span>
                        </div>
                    </div>
                </a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

            </div>
        </div>
    </body>
</html>
