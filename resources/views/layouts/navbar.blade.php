@if (Route::has('login'))
    <div class="container-fluid mx-auto login-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <span>Many recipies are waiting for you</span>
                </div>
                <div class="col-md-3">
                    @auth
                        {{-- <a class="btn-main" href="{{ url('/home') }}"><img src="">Home</a> --}}
                    @else
                        <a class="text-light" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                        <a class="text-light ml-4" href="{{route('register')}}">Regiter</a>
                        @endif
                    @endauth
                </div>
            </div>         
        </div>
    </div>
@endif
<nav class="navbar navbar-expand-md shadow-sm sticky-top">           
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            GREEN CONVERSATION 
            {{-- {{ config('app.name', 'Green') }} --}}
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <img src="/ico/menu.svg" alt="..." width="25px">
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto py-0 py-sm-2">               
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item d-md-none">
                    <Search :url="same('/posts/usersearch')" :res="same('/posts/usersearchresult')">{{ csrf_field() }}</Search>
                </li>
                @if(Auth::check() && Auth::user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link text-warning mr-md-4" href="/admin/posts">Admin</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link mr-md-4" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-md-4" href="/home">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-md-4" href="/about">About</a>
                </li>
                <li class="nav-item mr-md-4">
                    <a class="nav-link mr-md-4" href="/contact">Contact</a>
                </li>
                @guest
                @else
                    <li class="nav-item dropdown py-2">                        
                        <Profilephoto :src="{{json_encode(Auth::user()->src)}}" :cls="same('d-inline')"></Profilephoto>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="/pr/edit">Profile</a>
                            <button type="button" class="dropdown-item text-dark" data-toggle="modal" data-target="#chat">
                                Messages
                            </button>
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
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


<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Messages</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Clientsearch></Clientsearch>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>