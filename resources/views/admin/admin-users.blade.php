@extends('admin/admin-layouts/admin-panel')
@section('content')
<div class="container-fluid mt-2">
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
           <Search>{{ csrf_field() }}</Search>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <!-- tab 1 -->
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="overflow-auto table-container">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Option</th>
                        <th></th>
                        <th></th>
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
                              <button type="button" class="btn btn-danger dropdown-item" data-toggle="modal" data-target="#del{{$user->id}}">
                                Delete user
                              </button>
                            </div>
                        </div>
                        <!-- end dropdown -->
                    </td>
                    <!-- Modal Edit -->
                  <td>
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
                              :user-password="same('')"
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
                </td>                             
                 <td>
                   <!-- Modal Delete-->
                  <div class="modal fade" id="del{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body text-danger">
                        Are you sure to delete <span class="text-dark">{{$user->name}}, Email: {{$user->email}}</span> permanently? 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <form action="{{route('adminusers.destroy',$user->id)}}" method="POST">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>   
                            @csrf                       
                          </form>                      
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <!-- end modal -->
                </tr>            
               @endforeach             
            </table> 
          </div>
          @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{$users->links('vendor.pagination.simple-bootstrap-4')}}
          @endif                   
        </div>
          <!-- end tab 1 -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="container">
            <form action="{{route('adminusers.store')}}" method="POST">
              <div class="form-group">
                <label for="n_name">Name</label>
                <input type="text" name="name" id="n_name" class="form-control">
              </div>
              <div class="form-group">
                <label for="n_email">Email</label>
                <input type="text" name="email" id="n_email" class="form-control">
              </div>
              <div class="form-group">
                <label for="n_pass">Password</label>
                <input type="text" name="password" id="n_pass" class="form-control">
              </div>
              <div class="form-group">
                <label for="n_role">Role</label>
                <select class="form-control" name="role" id="n_role">
                  <option value="0">Subscriber</option>
                  <option value="1">Admin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
              @csrf
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
</div>
@endsection