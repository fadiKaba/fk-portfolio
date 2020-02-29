@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        @if(count($posts) > 0)
                        @foreach($posts as $post)
                        <div class="card mb-3">
                            @if($post->image)
                            <img src="./images/{{$post->image->url}}" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$post->post_title}}</h5>
                                <p class="card-text">{{$post->post_body}}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
