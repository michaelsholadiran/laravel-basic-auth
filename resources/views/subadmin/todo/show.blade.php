@extends('subadmin.layout.master')
@section('title','Dashboard')

@section('content')

<div class="content">

    <div class="container">
       



        <div class="row">



            <div class="col-md-12 col-lg-12">

                <div class="card">
                    <div class="card-header">{{$user->name}} Todo </div>
                    <div class="card-body">
                        <p class="card-title"></p>
                        <table class="table table-hover" id="dataTables-example" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Date</th>


                                </tr>
                            </thead>
                            <tbody>

                                @forelse($list as $l )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $l->title }}</td>
                                        <td>{{ $l->date }}</td>
                                    </tr>
                                @empty
                                    <tr>No Data</tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>

@endsection
