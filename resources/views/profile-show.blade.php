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
            <div class="mt-3">
                <span class="font-weight-bold">About {{$user->name}}</span><br>
                <span>{{$user->bio}}</span>
            </div>
            <div class="mt-3">
                <span class="font-weight-bold">Location</span><br>
                <span>{{$user->location}}</span>
            </div>
    </div>    
</div>


@endsection