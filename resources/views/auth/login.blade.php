@extends('auth.layout.master')
@section('title','Login')

@section('content')
 <div class="mb-4">

                    </div>
                    <h6 class="mb-4 text-muted">Login to your account</h6>
                    <form action="{{route('login.store')}}" method="post">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Email/Username" name="email" value="{{old('email')}}" >
                                <p>{{$errors->first('email')}}</p>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" >
                                <p>{{$errors->first('password')}}</p>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>
                    <p class="mb-0 text-muted">Don't have account yet? <a href="{{route('register')}}">Register</a></p>
   @endsection