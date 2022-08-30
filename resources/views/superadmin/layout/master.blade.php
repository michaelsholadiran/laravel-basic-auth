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
</head>

<body>
    <div class="wrapper">
      @yield('content')
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.mpin.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chartsjs/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard-charts.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
