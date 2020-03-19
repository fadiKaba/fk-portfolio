@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container-fluid mt-2 px-0 px-md-4">
    <ul class="nav nav-pills mb-3 secondary-navbar p-2 rounded" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Status</a>
        </li>
        <li class="nav-item">
           <Search :url="same('/posts/search')" :res="same('/posts/gotosearch')">{{ csrf_field() }}</Search>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="container-fluid overflow-auto px-0 px-md-5 mb-5">
            <div class="row justify-content-center">
              @foreach($posts as $post)
              <div class="col-md-5 mx-md-2">
                <div class="card my-2 ">
                  @if($post->image->url ?? null)
                  <img src="{{asset('./images/'.$post->image->url)}}" class="card-img-top" alt="...">
                  @endif
                  <div class="card-body">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <p class="card-text">{{$post->post_body}}</p>
                    <a href="/admin/posts/{{$post->id}}/edit" class="card-link btn btn-link">Edit</a>
                    <button type="button" class="card-link btn btn-link text-danger" data-toggle="modal" data-target="#p{{$post->id}}">
                      Delete
                    </button>
                  </div>
                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="p{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span class="text-danger">Are you sure to delete</span> {{$post->post_title}} ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                     <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Yes</button>
                        @csrf
                      </form>                
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
              @endforeach
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container form-container p-md-3">
              <h3 class="text-light">Add new post</h3>
                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post-title">Title</label>
                        <input class="form-control" required name="title" id="post-title" type="text">
                    </div>
                    <div class="form-group">
                        <label for="post-body">Body</label>
                        <textarea class="form-control" required name="body" rows="5" name="" id="post-body" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="post-img">Image</label>
                        <input class="form-control" name="image" id="post-img" type="file">
                    </div>
                    <button class="btn btn-light" type="submit">Post</button> 
                    @csrf                 
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Posts count: <span class="text-success">{{count($posts)}}</span></div>
      </div>
</div>
@endsection