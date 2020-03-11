@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 left-column px-0 my-2">
            <div>
                <h1 class="px-2 py-1 m-0">My website</h1>
            </div>
            <div class="mb-2">
                <img src="{{asset('/wallpapers/green-buildings.png')}}" alt="city" width="100%">
            </div>
            <div class="search-container-home">
                <Search :url="same('/posts/usersearch')" :res="same('/posts/usersearchresult')">{{ csrf_field() }}</Search>
            </div>       
        </div>            
        <div class="col-md-6 posts-container my-2 ">
            @if(count($posts) > 0)
            @foreach($posts as $post)
            <Mainpost
            :big="false"
            :src="{{json_encode($post->image != null ? $post->image->url : '')}}" 
            :title="{{json_encode($post->post_title)}}" 
            :body="{{json_encode($post->post_body)}}"
            :loged="{{json_encode(Auth::check())}}"
            :auth="{{json_encode(Auth::user())}}"
            :post="{{json_encode($post)}}"
            :like-c="{{json_encode(explode(',',$post->likes))}}"
            :comments="{{json_encode($post->comment()->with('user')->get())}}">           
            </Mainpost>
            @endforeach
            @endif
         </div> 
         <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('')}}" :loged="false"></Modal>
    </div>
</div>
@endsection





