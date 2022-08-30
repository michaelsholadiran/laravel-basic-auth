<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Default') | {{config('app.name')}}</title>
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/auth.css')}}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            @if (request()->role)
                
           
            <div class="text-center">
                <a href="{{route('login',['role'=>'superadmin'])}}" class="btn btn-outline-info mb-2 {{request()->role=='superadmin'?
                    "active":""
                }}">Super Admin</a>
                <a href="{{route('login',['role'=>'subadmin'])}}" class="btn btn-outline-info mb-2  {{request()->role=='subadmin'?
                    "active":""
                }}">Sub Admin</a>
                <a href="{{route('login',['role'=>'user'])}}" class="btn btn-outline-info mb-2  {{request()->role=='user'?
                    "active":""
                }}">User</a>
             
            </div>
             @endif
            <div class="card">
                <div class="card-body text-center">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>