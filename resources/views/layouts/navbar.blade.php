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
        <a class="navbar-brand" id="brand" href="{{ url('/') }}">
            <img src="/ico/main-logo.png" width="35px">
            Better Life 
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
                    <a class="nav-link mr-md-4 @if(isset($page))@if($page == 'welcome') active @endif @endif" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-md-4 @if(isset($page))@if($page == 'blog') active @endif @endif" href="/home">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-md-4 @if(isset($page))@if($page == 'about') active @endif @endif" href="/about">About</a>
                </li>
                <li class="nav-item mr-md-4">
                    <a class="nav-link mr-md-4 @if(isset($page))@if($page == 'contact') active @endif @endif" href="/contact">Contact</a>
                </li>
                @guest
                @else
                    <li class="nav-item dropdown py-2">  
                        <span v-on:click="newMsg = false" class="badge badge-danger text-light notification-badge" v-if="newMsg == true" data-toggle="modal" data-target="#chat">!</span>                      
                        <Profilephoto :src="{{json_encode(Auth::user()->src)}}" :cls="same('d-inline')" :size="'25px'"></Profilephoto>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="/pr/edit">Profile</a>
                            <button v-on:click="newMsg = false" type="button" class="dropdown-item text-dark d-none d-md-block" data-toggle="modal" data-target="#chat">
                                <span class="badge badge-danger text-light" v-if="newMsg == true">!</span> Messages
                            </button>
                            <a v-on:click="newMsg = false" href="/messengermobile" class="dropdown-item text-dark d-md-none">
                                <span class="badge badge-danger text-light" v-if="newMsg == true">!</span> Messages
                            </a>
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
@if(Auth::check())
<div class="modal fade bd-example-modal-lg" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="exampleModalCenterTitle">Messages</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <Clientsearch v-on:newconversation="newconversation">{{ csrf_field() }}</Clientsearch>
                </div>
                <div class="col-md-9">
                    <Messanger :clear="clearm" v-on:newmessage="newmessage" :sender="userSender" :auth="{{json_encode(Auth::user())}}"></Messanger>
                </div>
                <div class="col-md-3 border-left">
                    <Contacts :open-conversation="conversationWith" :sender-new="senderNew" v-on:clearmessenger="clearmessenger" v-on:newmessage="newmessage" v-on:snedsender="sendSenderAgain" :auth="{{json_encode(Auth::user())}}"></Contacts>
                </div>
            </div>           
        </div>

      </div>
    </div>
</div>
@endif

