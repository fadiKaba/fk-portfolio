@extends('layouts.app')

@section('content')
<div class="blog-showcase">
    <p>Home blog</p>
    <h3>Blog</h3>
</div>
<div class="container-fluid">
    <div class="row justify-content-center left-column-container">
        {{-- <div class="col-md-3 left-column px-0 my-2">
            <div>
                <h1 class="px-2 py-1 m-0">Welcome to {{ config('app.name', 'Green') }}</h1>
            </div>
            <div class="mb-2">
               <img src="{{asset('/wallpapers/green-buildings.png')}}" alt="city" width="100%"> 
            </div>
            <div class="search-container-home mb-2">
                <div class="card  rounded-0 d-none d-md-block">
                    <div class="card-header text-light rounded-0">
                      Search
                    </div>
                    <div class="card-body bg-light">
                      <p class="card-text"><Search :url="same('/posts/usersearch')" :res="same('/posts/usersearchresult')">{{ csrf_field() }}</Search></p>
                    </div>
                  </div>                
            </div>
            <div class=" d-none d-sm-block search-container-home">
                <div class="card  rounded-0">
                    <div class="card-header text-light rounded-0">
                        Advertisment
                    </div>
                    <div class="card-body bg-light">
                        <a href="#"><img src="{{asset('wallpapers/adver.jpeg')}}" width="100%" alt=""></a>
                    </div>
                  </div> 
            </div>     
        </div>          --}}
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





