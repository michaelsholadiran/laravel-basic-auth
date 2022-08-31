<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield('title','Default') | {{config('app.name')}}</title>
    <link href="{{asset('assets/vendor/fontawesome/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/brands.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}"  rel="stylesheet">
    <link href="{{asset('assets/vendor/flagiconcss/css/flag-icon.min.css')}}" rel="stylesheet">
     <link href="{{asset('assets/vendor/subadmin/subadmin.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
      <div id="body" class="active col-10 mx-auto">
         <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <div> <a href="{{route('subadmin.dashboard.index')}}">Dashboard</a></div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ms-auto">

                <li class="nav-item dropdown">
                    <div class="nav-dropdown">
                        <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>
                            <span>{{ auth('subadmin')->user()->name }}</span> <i
                                style="font-size: .8em;" class="fas fa-caret-down"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                            <ul class="nav-list">
                                <li><a href="{{route('subadmin.account.index')}}" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li><a href="{{ route('logout') }}" class="dropdown-item"><i
                                            class="fas fa-sign-out-alt"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
      @yield('content')
    </div>
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.mpin.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard-charts.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/vendor/subadmin/subadmin.min.js')}}"></script>
    <script src="{{asset('assets/js/initiate-subadmin.js')}}"></script>
</body>

</html>
