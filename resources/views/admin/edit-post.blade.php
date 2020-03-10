@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container">
    <div class="row p-md-3">
        @if($post->image != null && $post->image != '')
        <div class="col-md-6">
           <img src="{{asset('./images/'.$post->image->url)}}" alt="img" width="100%">
        </div>
        @endif
        <div class="col-md-6">
            <div class="form-container p-md-3">
                <form action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data" method="POST">
                    @method('PATCH')
                    <div class="form-group">
                        <label for="">Title</label>
                        <input class="form-control" name="title" type="text" value="{{$post->post_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea rows="5" class="form-control" name="body" type="text">{{$post->post_body}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" type="text">
                    </div>
                    <button class="btn btn-light" type="submit">Save</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection