<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin control panel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="adm">
        <div>
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg fixed-top main-nav p-0">
              <div class="container">
                <a class="navbar-brand text-light" href="/home">Better Life</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <img src="{{asset('ico/menu-light.svg')}}" alt="Menu" width="30px">
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{route('posts.index')}}">Posts <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('adminusers.index')}}">Users</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/home">Home</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
              <!-- end navbar -->
        </div>
        @include('layouts/error')
        <div>
            @yield('content')
        </div>
        <Foot></Foot> 
    </div> 
</body>
</html>
