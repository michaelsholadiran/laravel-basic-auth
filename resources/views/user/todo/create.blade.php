@extends('user.layout.master')
@section('title','Dashboard')

@section('content')

<div class="content">

    <div class="container">
        <div class="row">

            <div class="col-lg-6 mx-auto">
                @if( Session::get('status'))
                    <div class="alert alert-success" role="alert">Success!</div>
                @endif


                <div class="card">


                    <div class="card-header">New Todo</div>
                    <div class="card-body">
                        <form action="{{ route('user.todo.store') }}" method="post"
                            accept-charset="utf-8" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" placeholder="title" class="form-control"
                                    value="{{ old('name') }}">
                                <p>{{ $errors->first('title') }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" name="date" placeholder="User Name" class="form-control"
                                    value="{{ old('username') }}">
                                <p>{{ $errors->first('date') }}</p>
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="Create" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>



</div>

@endsection
