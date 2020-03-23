@extends('layouts/app')
@section('content')

<div class="container row mt-3 mb-5 mx-auto bg-light p-md-4">
    <div class="col-md-4 my-3">
       <img 
       class="rounded"       
       @if($user->src == null || $user->src == '')
       src="{{asset('wallpapers/default-user.png')}}" 
       @else
       src="/photos/{{$user->src}}"
       @endif
        alt="profile-photo" width="100%">
    </div>
    <div class="col-md-6 mt-2 py-2">
        <h3 class="font-weight-bold text-capitalize">{{$user->name}}</h3>
        <span class="font-weight-bold">Email</span><br>
        <span class="text-muted">{{$user->email}}</span>
             @if($user->bio != '' && $user->bio != null)       
            <div class="mt-3">
                <span class="font-weight-bold">About {{$user->name}}</span><br>                
                <span>{{$user->bio}}</span>               
            </div>
            @endif          
            @if($user->location != '' && $user->location != null)
            <div class="mt-3">
                <span class="font-weight-bold">Location</span><br>
                <span>{{$user->location}}</span>
            </div>
            @endif
            <div class="mt-3">
                <button class="btn green" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Send message</button> 
                <div class="collapse mt-2" id="collapseExample">
                    <div class="card card-body">
                        <form action="/message/singlemessage" method="POST"> 
                            <input type="hidden" name="to" value="{{$user->id}}">
                            <div class="form-group">
                               <textarea class="form-control" name="message" cols="30" rows="2" placeholder="Write a message to {{$user->name}}"></textarea>
                            </div>                           
                            <button class="btn green">Send</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
                                 
    </div>       
</div>
                  


@endsection