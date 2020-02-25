@if(count($errors) > 0)
@foreach($errors->all() as $err)
<div class="alert alert-danger text-center font-weight-bold">
    {{$err}}
</div>
@endforeach
@endif
@if(session('success'))
<div class="alert alert-success text-center font-weight-bold">
    {{session('success')}}
</div>
@endif