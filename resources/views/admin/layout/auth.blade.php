<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>{{ config('constants.site_title', 'TAXI3') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>

    <!-- Vendor CSS 
    <link rel="stylesheet" href="{{asset('main/vendor/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('main/vendor/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('main/assets/css/core.css')}}">-->
    <link rel="stylesheet" href="{{asset('main/vendor/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('main/assets/css/style.css')}}">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="form">

        @yield('content')

    </div>
        <!-- Vendor JS 
        <script type="text/javascript" src="{{asset('main/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('main/vendor/tether/js/tether.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('main/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>-->
        <script type="text/javascript" src="{{asset('main/vendor/jquery/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('main/vendor/bootstrap4/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('main/assets/js/admin-login.js')}}"></script>
        @if(Setting::get('demo_mode', 0) == 1)
            {{--Chat support here--}}
        @endif
    </body>
</html>
