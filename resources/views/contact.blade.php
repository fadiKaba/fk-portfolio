@extends('layouts/app')

@section('title', 'Contact')

@section('content')

<div class="contact-container">
    <div class="contact-showcase">
        <p>Home Contact</p>
        <h3>Contact us</h3>
    </div>
    <div class="container content mt-3 mb-5">
        <div class="row">
            <div class="col-md-6 contact-col1 mr-md-4 d-none d-md-block"></div>
            <div class="col-md-5 p-3 p-md-5 contact-col2">
                @if(Auth::check())
                <div>
                    <form action="/mail/send" method="POST">
                        <div class="form-group">
                            <input class="form-control" required name="subject" type="text" id="subject" value="{{old('subject')}}" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" required name="message" id="" cols="30" rows="10" placeholder="Message">
                                {{old('message')}} 
                            </textarea>
                        </div>
                        @if(Auth::check())                     
                        <button class="btn green">Send</button>
                        @endif
                        @csrf
                    </form>
                    @if(!Auth::check())
                    <button class="btn green" data-toggle="modal" data-target="#notloged">Send</button>
                    @endif
                </div>
                @else
                <div class="text-muted font-weight-bold text-center">
                    <img src="/ico/contact.svg" alt="mail" width="50%">
                   <p><a href="/login">Login</a> Or <a href="/register">register</a>  to contact us</p> 
                </div>
                @endif
            </div>
        </div>       
    </div>
    <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('')}}" :loged="false"></Modal>
</div>

@endsection