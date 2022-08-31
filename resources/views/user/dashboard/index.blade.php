@extends('user.layout.master')
@section('title','Dashboard')

@section('content')
            <div class="content">
              
 <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>

                         @if ( Session::get('status'))
                      <div class="alert alert-success" role="alert">Success!</div>
                @endif
                        @include('user.dashboard.list',['list'=>$todo,'name'=>'Todo'])
                    </div>
                    </div>



            </div>
     
@endsection