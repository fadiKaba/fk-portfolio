@extends('layouts/app')
@section('content')


<div class="mt-2">
    <Clientsearch>{{ csrf_field() }}</Clientsearch>
</div>


<div class="mt-2 mb-5 border-bottom">
    <Contacts :small="true" v-on:clearmessenger="clearmessenger" v-on:newmessage="newmessage" v-on:snedsender="sendSenderAgain" :auth="{{json_encode(Auth::user())}}"></Contacts>
</div>

<!-- Modal -->
<div class="modal fade" id="mobile-messenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Messanger :clear="clearm" v-on:newmessage="newmessage" :sender="userSender" :auth="{{json_encode(Auth::user())}}"></Messanger>
        </div>
      </div>
    </div>
  </div>
        


@endsection