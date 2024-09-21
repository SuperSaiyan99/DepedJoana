<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ secure_asset('assets3/img/kaiadmin/favicon.ico') }}" type="image/x-icon"/>

    <meta charset="utf-8">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and icons -->
    <script src="{{  secure_asset('assets3/js/plugin/webfont/webfont.min.js') }}"></script>

    <script>
        WebFont.load({
            google: {
                "families": [
                    "Public Sans:300,400,500,600,700"
                ]
            },

            custom: {
                "families": [
                    "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"
                ],
                urls: [
                    '{{ secure_asset('assets3/css/fonts.min.css') }}'
                ]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ secure_asset('assets3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets3/css/plugins.min.css')  }}">
    <link rel="stylesheet" href="{{ secure_asset('assets3/css/kaiadmin.min.css')  }}">

    <!-- page css -->
    @hasSection('css')
        @yield('css')
    @endif


</head>
<body>
<div id="wrapper">

    @yield('sidebar')

    <div class="main-panel">

        <div class="main-header">

            @yield('main-header-logo')

            @yield('navigation')

        </div>

        <!--[container]-->
        <div class="container">
            @yield('contents')
        </div>

    </div>

</div>

<!--   Core JS Files   -->
<script src="{{ secure_asset('assets3/js/core/jquery-3.7.1.min.js')  }}"></script>
<script src="{{ secure_asset('assets3/js/core/popper.min.js') }}"></script>
<script src="{{ secure_asset('assets3/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ secure_asset('assets3/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<!-- Moment JS -->
<script src="{{ secure_asset('assets3/js/plugin/moment/moment.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ secure_asset('assets3/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ secure_asset('assets3/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ secure_asset('assets3/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ secure_asset('assets3/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ secure_asset('assets3/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ secure_asset('assets3/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ secure_asset('assets3/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ secure_asset('assets3/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ secure_asset('assets3/js/kaiadmin.min.js') }}"></script>

<!-- Customized JS -->
@hasSection('js')
    @yield('js')
@endif


</body>
</html>
