@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container-fluid mt-2">
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
           <Search :url="same('')">{{ csrf_field() }}</Search>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">aa</div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div>
                <form action="">
                    <div class="form-group">
                        <label for="post-title">Title</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="post-title">Body</label>
                        <textarea class="form-control" rows="5" name="" id="" cols="30" rows="10"></textarea>
                    </div> 
                    <div class="form-group">
                        <label for="post-title">Image</label>
                        <input class="form-control" type="file">
                    </div>                  
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">xx</div>
      </div>
</div>
@endsection