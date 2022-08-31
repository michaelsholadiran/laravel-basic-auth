@extends('superadmin.layout.master')
@section('title','Dashboard')

@section('content')

    <div class="content">

        <div class="container">
            <div class="row">

                <div class="col-lg-6 mx-auto">
                @if ( Session::get('status'))
                      <div class="alert alert-success" role="alert">Success!</div>
                @endif
                   
                   
                    <div class="card">
                       
                       
                        <div class="card-header">Update User</div>
                        <div class="card-body">
                            <form  action="{{route('superadmin.user.update',['user'=>$user->id])}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" placeholder="Name" class="form-control" value="{{$user->name}}">
                                    <p>{{$errors->first('name')}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">User Name</label>
                                    <input type="text" name="username" placeholder="User Name" class="form-control" value="{{$user->username}}">
                                     <p>{{$errors->first('username')}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
                                     <p>{{$errors->first('email')}}</p>
                                </div>
                                 <div class="mb-3">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" name="photo"  class="form-control">
                                     <p>{{$errors->first('photo')}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                     <p>{{$errors->first('password')}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                                     <p>{{$errors->first('password_confirmation')}}</p>
                                </div>
                                  <div class="mb-3 text-start">
                            <label for="role" class="form-label">Role</label>
                           <select name="role" class="form-select">
                           
                            <option @if ($user->role == "superadmin")
                                selected
                            @endif value="superadmin">Super Admin</option>
                            <option @if ($user->role == "subadmin")
                                selected
                            @endif value="subadmin">Sub Admin</option>
                            <option @if ($user->role == "user")
                                selected
                            @endif value="user">User</option>
                           </select>
                              <p>{{$errors->first('role')}}</p>
                        </div>
                                <div class="mb-3">
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>



    </div>

@endsection
