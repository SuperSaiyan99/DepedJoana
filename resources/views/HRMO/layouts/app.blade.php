<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta content="Joana, Your Portal for a DepEd Job!" name="description"/>
    <meta content="venzthegreathd" name="author"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Bootstrap Css -->
    <link href="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/css/bootstrap.min.css" id="bootstrap-style"
          rel="stylesheet" type="text/css"/>

    <!-- App Css-->
    <link href="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/css/app.min.css" id="app-style" rel="stylesheet"
          type="text/css"/>

    <!-- Icons Css -->
    <link href="{{ secure_asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>


    @hasSection('css')
        @yield('css')
    @endif

</head>
<body data-sidebar="dark">


<!-- start of wrapper-->
<div class="layout-wrapper">

    @hasSection('header')
        @yield('header')
    @endif

    @hasSection('left-sidebar')
        @yield('left-sidebar')
    @endif


    <div class="main-content">
        @yield('content')
    </div>


</div>
<!-- end of wrapper-->

<!-- JS -->
<script src="{{ secure_asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ secure_asset('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ secure_asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ secure_asset('assets/js/app.js') }}"></script>


@hasSection('js')
    @yield('js')
@endif
</body>
</html>
