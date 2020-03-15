<nav class="navbar navbar-expand-md shadow-sm sticky-top p-0">           
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('ico/logo.png')}}" width="40px"> 
            {{-- {{ config('app.name', 'Green') }} --}}
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <img src="/ico/menu.svg" alt="..." width="25px">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto py-0 py-sm-2">               
                <li class="nav-item text-center d-md-none">
                    <Search :url="same('/posts/usersearch')" :res="same('/posts/usersearchresult')">{{ csrf_field() }}</Search>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item text-center ">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                @if(Auth::check() && Auth::user()->is_admin == 1)
                <li class="nav-item text-center ">
                    <a class="nav-link text-warning" href="admin/posts">Admin</a>
                </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item text-center">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item text-center">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown text-center py-2">                        
                        <Profilephoto :src="{{json_encode(Auth::user()->src)}}" :cls="same('d-inline')"></Profilephoto>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item text-dark" href="{{route('profile',Auth::id())}}">Profile</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>