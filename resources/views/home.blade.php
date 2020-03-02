@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            @if(count($posts) > 1)
            @for($i = 1; $i < count($posts); $i++)
            <Minipost
            :src="same('{{$posts[$i]->image != null ? $posts[$i]->image->url : ''}}')"
            :title='same("{{$posts[$i]->post_title}}")'
            :body="same('{{$posts[$i]->post_body}}')">
            </Minipost>
            @endfor
            @endif
        </div>
        <div class="col-md-6">
            @if(count($posts) > 0)
            <Mainpost 
            :src="same('{{$posts[0]->image != null ? $posts[0]->image->url : ''}}')" 
            :title="same('{{$posts[0]->post_title}}')" 
            :body="same('{{$posts[0]->post_body}}')">
            </Mainpost>
            @endif
         </div> 
    </div>
</div>
@endsection





