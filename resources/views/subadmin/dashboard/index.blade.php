@extends('subadmin.layout.master')
@section('title','Dashboard')

@section('content')

            <div class="content">
              
 <div class="container">
     <div class="col-lg-12 mx-auto text-center">
                        <img style="width:10%" class="border p-4 m-4" src="{{asset("storage/".auth('subadmin')->user()->photo)}}" alt="">
                </div>
              
                            @if ( Session::get('status'))
                      <div class="alert alert-success" role="alert">Success!</div>
                @endif
                     
                        @include('subadmin.dashboard.list',['list'=>$subadmin,'name'=>'Sub Admin'])
                        @include('subadmin.dashboard.list',['list'=>$user,'name'=>'User'])

 
               
                    </div>



            </div>
    
@endsection