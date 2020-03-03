@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3 left-column px-0 ">
            <div>
                <h1 class="px-2 py-1 rounded-top">My website</h1>
            </div>
            <div class="my-2">
                <img src="{{asset('/wallpapers/city-green.png')}}" alt="city" width="100%">
            </div>
            <div>
                <Search></Search>
            </div>       
        </div>
        <div class="col-md-6">
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





