@extends('layouts/app')
@section('content')
    <div class="container">
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
        <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('You need to login')}}"></Modal>
    </div>
@endsection