@if(count($errors) > 0)
@foreach($errors->all() as $err)
<div class="alert alert-danger text-center font-weight-bold">
    {{$err}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endforeach
@endif
@if(session('success'))
<div class="alert alert-success text-center font-weight-bold">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif