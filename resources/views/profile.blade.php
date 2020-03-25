@extends('layouts/app')

@section('title', 'Profile')

@section('content')
<div class="container row mt-3 mb-5 mx-auto bg-light p-md-4">
    <div class="col-md-4 my-3">
       <img 
       class="rounded"       
       @if($userAuth->src == null || $userAuth->src == '')
       src="{{asset('wallpapers/default-user.png')}}" 
       @else
       src="/photos/{{$userAuth->src}}"
       @endif
        alt="profile-photo" width="100%">
        @if($userAuth->src != null || $userAuth->src != '')
        <form action="{{route('delphoto', Auth::id())}}" method="post" onsubmit="return confirm('Delete your photo?')">
            @method('DELETE')
            <button  class="btn btn-dark mt-2" type="submit">Delete your photo</button>
            @csrf
        </form>
        @endif
    </div>
    <div class="col-md-6">
        <p class="font-weight-bold">EMAIL</p>
        <p class="text-muted">{{$userAuth->email}}</p>
        <form action="{{route('updateprofile', Auth::id())}}" enctype="multipart/form-data" method="POST">           
            <div class="form-group">
                <label for="name" class="font-weight-bold">DISPALY NAME</label>
                <input 
                class="form-control" 
                type="text" 
                name="name" 
                id="name" 
                value="{{$userAuth->name}}">
            </div>
            <div class="form-group">
                <label for="bio" class="font-weight-bold">ABOUT YOU</label>
                <textarea class="form-control" placeholder="About you" name="bio">{{$userAuth->bio}}</textarea>
            </div>
            <div class="form-group">
                <label for="location" class="font-weight-bold">LOCATION</label>
                <input class="form-control" type="text" name="location" id="location" placeholder="Location" value="{{$userAuth->location}}">
            </div>
            <div class="form-group">
                <label for="img" class="font-weight-bold">EDIT PROFILE PHOTO</label>
                <input class="form-control" type="file" name="img" id="img">
            </div>
            <button class="btn green" type="submit">Save</button>
            @csrf
        </form>
    </div>    
</div>

@endsection
