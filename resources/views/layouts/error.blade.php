{{-- @if(count($errors) > 0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger text-center">
{{$error}}
</div>   
@endforeach 
@endif
@if(session('success'))
  <div class="alert alert-success text-center">
      {{session('success')}}
  </div>
@endif
@if(session('error'))
  <div class="alert alert-danger text-center">
      {{session('error')}}
  </div>
@endif --}}


{{-- @if(count($errors) > 0)
@foreach($errors->all() as $error){{dd($errors)}}
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@else

@endif

@if(session('success'))
<div>{{session(success)}}</div>
@endif --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif