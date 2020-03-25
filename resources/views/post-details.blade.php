@extends('layouts/app')

@section('title', 'GreenConversation')

@section('content')
    <div class="">
        <div class="container-fluid">
            <Mainpost   
            :big="true"
            :src="{{json_encode($post[0]->image != null ? $post[0]->image->url : '')}}" 
            :title="{{json_encode($post[0]->post_title)}}" 
            :body="{{json_encode($post[0]->post_body)}}"
            :loged="{{json_encode(Auth::check())}}"
            :auth="{{json_encode(Auth::user())}}"
            :post="{{json_encode($post[0])}}"
            :like-c="{{json_encode(explode(',',$post[0]->likes))}}"
            :comments="{{json_encode($post[0]->comment()->with('user')->get())}}">           
            </Mainpost>
            <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('')}}" :loged="false"></Modal>
        </div>
    </div>
@endsection