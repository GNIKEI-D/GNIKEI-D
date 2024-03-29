<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('constants.site_title','TAXI3')}} - @yield('title') - მართვა</title>
    <link rel="shortcut icon" type="image/png" href="{{ config('constants.site_icon') }}"/>

    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/slick.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/slick-theme.css')}}"/>
    <link href="{{asset('asset/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap-timepicker.css')}}" rel="stylesheet">
    @if(Config::get('app.locale')=='ar')
    <link href="{{asset('asset/css/arabic_dashboard-style.css')}}" rel="stylesheet">
    @else
    <link href="{{ asset('asset/css/dashboard-style.css') }}" rel="stylesheet" type="text/css">
    @endif
    <link rel="stylesheet" href="{{ asset('main/assets/css/style_dialog.css')}}">
    @yield('styles')
</head>

<body>

    @include('user.include.header')

    <div class="page-content dashboard-page">    
        <div class="container">
        @php
        $route_name = Request::path();
        $allRouteDialog = config('guidelines.demo_mode_dialog.user');
        $checkRouteDialog = isset($allRouteDialog[$route_name])?"true":"false";
        $tempVar = (Session::get($route_name))?Session::get($route_name):"false";
        if($checkRouteDialog =="true"){
        $dialog = $allRouteDialog[$route_name];
        }
        @endphp

@if($checkRouteDialog =="true")
<div id="demoModeDialog" class="demoModeDialogmodal">
        <div class="demoModeDialogmodal-content text-center">
            <span class="demoModeDialogclose">&times;</span>
            <div class="row demoModeDialogdis demoModeDialogdis1">
                <p> {!! $dialog !!} </p>
           </div>
         </div>
    </div>
    @endif
            @include('user.include.nav')
            @yield('content')

        </div>
    </div>


    @include('user.include.footer')


    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>       
    <script type="text/javascript" src="{{asset('asset/js/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/jquery-migrate-1.2.1.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('asset/js/slick.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('asset/js/dashboard-scripts.js')}}"></script>
    @if(Setting::get('demo_mode', 0) == 1)
{{--Chat support here--}}
    @endif
    @if(($checkRouteDialog =="true") && (Setting::get('demo_mode', 0) == 1) && ($tempVar =="false"))
    {{Session::put($route_name,'true')}}
         <script type="text/javascript">
            var demoModeDialogmodal = document.getElementById('demoModeDialog');
            demoModeDialogmodal.style.display = "block";
            var demoModeDialogspan = document.getElementsByClassName("demoModeDialogclose")[0];
            demoModeDialogspan.onclick = function() 
            {
                demoModeDialogmodal.style.display = "none";
            }
            </script>
    @endif 
    @yield('scripts')
    
</body>
</html>