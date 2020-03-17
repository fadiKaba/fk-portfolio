@extends('layouts/app')
@section('content')

<div class="contact-container">
    <div class="contact-showcase">
        <p>Home Contact</p>
        <h3>Contact us</h3>
    </div>
    <div class="container content mt-3 mb-5">
        <div class="row">
            <div class="col-md-6 contact-col1 mr-md-4"></div>
            <div class="col-md-5 p-3 p-md-5 contact-col2">
                <div>
                    <form action="/mail/send" method="POST">
                        <div class="form-group">
                            <input class="form-control" required name="subject" type="text" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" required name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
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
            </div>
        </div>       
    </div>
    <Modal :modal-id="{{json_encode('notloged')}}" :modal-text="{{json_encode('')}}" :loged="false"></Modal>
</div>

@endsection