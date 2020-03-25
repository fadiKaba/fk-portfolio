@extends('layouts.app')
@section('title', 'Blog')
@section('content')
<div class="blog-showcase">
    <p>Home blog</p>
    <h3>Blog</h3>
</div>
<hr class="my-3 d-md-none">
<div class="container-fluid">
    <div class="row justify-content-center left-column-container">
        <div class="col-md-7 posts-container my-2 px-0 px-md-4">
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
            @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{$posts->links('vendor.pagination.simple-bootstrap-4')}}
            @endif 
         </div> 
         <div class="col-md-3 d-none d-md-block">
            <p><Search :url="same('/posts/usersearch')" :res="same('/posts/usersearchresult')">{{ csrf_field() }}</Search></p>
            <div class="mt-md-5">
                <h5>Paragraph</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, pariatur sint voluptas ex enim in qui inventore
                     rem, optio repellat quos veritatis. Fugiat cum quam velit autem ipsum eos voluptates doloremque nemo necessitatibus 
                     ipsam hic tempora expedita dolorem odit, rerum similique consequatur earum placeat fugit ipsa rem numquam optio.
                </p>
            </div>
         </div>
         <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('')}}" :loged="false"></Modal>
    </div>
</div>
@endsection





