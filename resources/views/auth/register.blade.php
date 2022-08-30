@extends('auth.layout.master')
@section('title','Register')

@section('content')
<h6 class="mb-4 text-muted">Create new account</h6>

                    <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{old('name')}}" >
                            <p>{{$errors->first('name')}}</p>
                        </div>
                          <div class="mb-3 text-start">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" name="username"  value="{{old('username')}}">
                             <p>{{$errors->first('username')}}</p>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{old('email')}}">
                              <p>{{$errors->first('email')}}</p>
                        </div>
                         <div class="mb-3 text-start">
                            <label for="photo" class="form-label d-block">Photo</label>
                            <input type="file" name="photo" >
                              <p>{{$errors->first('photo')}}</p>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" >
                              <p>{{$errors->first('password')}}</p>
                        </div>
                     
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" >
                              <p>{{$errors->first('password_confirmation')}}</p>
                        </div> 

                        <div class="mb-3 text-start">
                            <label for="role" class="form-label">Role</label>
                           <select name="role" class="form-select">
                            <option value="superadmin">Super Admin</option>
                            <option value="subadmin">Sub Admin</option>
                            <option value="user">User</option>
                           </select>
                              <p>{{$errors->first('role')}}</p>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Register</button>
                    </form>
                    <p class="mb-0 text-muted">Already have an account? <a href="{{route('login')}}">Log in</a></p>
@endsection