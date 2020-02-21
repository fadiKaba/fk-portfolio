@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container mt-2">
    <ul class="nav nav-pills mb-3 secondary-navbar p-2" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add user</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Status</a>
        </li>
        <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 ml-md-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
              </form>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <!-- tab 1 -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Option</th>
                    </tr>
                </thead>        
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
                    <td>
                        <!-- dropdown -->
                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img width="25px" src="{{asset('icons/edit.svg')}}">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <!-- Button trigger modal -->
                              <button type="button" class="dropdown-item btn btn-primary" data-toggle="modal" data-target="#usmo{{$user->id}}">
                                    Edit
                              </button>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <!-- end dropdown -->
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="usmo{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">{{$user->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <Edituserform 
                            :user-id="same('{{$user->id}}')"
                            :user-name="same('{{$user->name}}')" 
                            :user-email="same('{{$user->email}}')" 
                            :user-role="
                            @if($user->is_admin == 1) 
                            same('Admin')
                            @else
                            same('Subscriber')
                            @endif">
                        </Edituserform>
                    </div>
                    </div>
                </div>
                <!-- end Modal -->   
               @endforeach
            </table>
        </div>
          <!-- end tab 1 -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>


    
</div>
@endsection