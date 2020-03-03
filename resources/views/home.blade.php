@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 left-column px-0 my-2">
            <div>
                <h1 class="px-2 py-1">My website</h1>
            </div>
            <div class="mb-2">
                <img src="{{asset('/wallpapers/city-green.png')}}" alt="city" width="100%">
            </div>
            <div class="search-container-home p-2">
                <Search></Search>
            </div>       
        </div>
        <div class="col-md-6 posts-container my-2 ">
            @if(count($posts) > 0)
            @foreach($posts as $post)
            <Mainpost 
            :src="{{json_encode($post->image != null ? $post->image->url : '')}}" 
            :title="{{json_encode($post->post_title)}}" 
            :body="{{json_encode($post->post_body)}}">
            </Mainpost>
            @endforeach
            @endif
         </div> 
    </div>
</div>
@endsection





