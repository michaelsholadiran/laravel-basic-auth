@extends('user.layout.master')
@section('title','Dashboard')

@section('content')

   
    <div class="content">

        <div class="container">
            <div class="row">
 @if ( Session::get('status'))
                      <div class="alert alert-success" role="alert">Success!</div>
                @endif
                <div class="col-lg-12 mx-auto text-center">
                        <img style="width:10%" class="border p-4 m-4" src="{{asset("storage/{$user->photo}")}}" alt="">
                </div>
                <div class="col-lg-6 mx-auto">
               
                   
                   
                    <div class="card">
                       
                       
                        <div class="card-header">Update Super Admin</div>
                        <div class="card-body">
                            <form  action="{{route('user.account.update',['account'=>$user->id])}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                               
                                  <div class="mb-3 text-start">
                            <label for="role" class="form-label">Role</label>
                           <select name="role" class="form-select">
                           
                            <option @if ($user->role == "user")
                                selected
                            @endif value="user">Super Admin</option>
                            <option @if ($user->role == "user")
                                selected
                            @endif value="user">Sub Admin</option>
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



                  <div class="col-lg-6 mx-auto">
               
                   
                   
                    <div class="card">
                       
                       
                        <div class="card-header">Security</div>
                        <div class="card-body">
                            <form  action="{{route('user.account.update',['account'=>$user->id])}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                               
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control">
                                     <p>{{$errors->first('password')}}</p>
                                </div>
                                 <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" name="new_password" placeholder="New Password" class="form-control">
                                     <p>{{$errors->first('new_password')}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="new_password_confirmation" placeholder="Confirm Password" class="form-control">
                                     <p>{{$errors->first('new_password_confirmation')}}</p>
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
