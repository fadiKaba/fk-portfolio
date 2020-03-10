@extends('layouts/app')
@section('content')

<div class="container row m-auto bg-light p-md-3">
    <div class="col-md-6">
       <img 
       
       @if($userAuth->src == null || $userAuth->src == '')
       src="{{asset('wallpapers/default-user.png')}}" 
       @else
       src="/photos/{{$userAuth->src}}"
       @endif
        alt="profile-photo" width="100%">
    </div>
    <div class="col-md-6">
        <form action="{{route('editprofile', Auth::id())}}" enctype="multipart/form-data" method="POST">           
            <div class="form-group">
                <label for="name">Edit your name</label>
                <input 
                class="form-control" 
                type="text" 
                name="name" 
                id="name" 
                value="{{$userAuth->name}}">
            </div>
            <div class="form-group">
                <label for="img">Edit your profile photo</label>
                <input class="form-control" type="file" name="img" id="img">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            @csrf
        </form>
        @if($userAuth->src != null || $userAuth->src != '')
        <form action="{{route('delphoto', Auth::id())}}" method="post" onsubmit="return confirm('Delete your photo?')">
            @method('DELETE')
            <button  class="btn btn-dark mt-2" type="submit">Delete your photo</button>
            @csrf
        </form>
        @endif
    </div>    
</div>


@endsection
