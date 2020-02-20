@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Option</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                @if($user->is_admin == 1) 
                Admin
                @else
                Subscriber
                @endif
            </td>
            <td>__</td>
        </tr>   
       @endforeach
    </table>
</div>
@endsection