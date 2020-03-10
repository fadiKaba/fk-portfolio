@extends('layouts/app')
@section('content')

<div class="container row m-auto bg-light p-md-3">
    <div class="col-md-6">
        <img src="" alt="profile-photo">
    </div>
    <div class="col-md-6">
        <form action="{{route('editprofile', Auth::id())}}" enctype="multipart/form-data" method="POST">           
            <div class="form-group">
                <label for="img">Edit your name</label>
                <input class="form-control" type="text" name="img" id="img">
            </div>
            <div class="form-group">
                <label for="img">Profile photo</label>
                <input class="form-control" type="file" name="img" id="img">
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            @csrf
        </form>
    </div>    
</div>


@endsection