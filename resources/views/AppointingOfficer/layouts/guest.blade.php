<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Joana</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ secure_asset('assets2/img/favicon.png')}}" rel="icon">
    <link href="{{ secure_asset('assets2/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    {{--
       <!-- Favicons -->
      <link href="{{ secure_asset('assets2/img/favicon.png')}}" rel="icon">
      <link href="{{ secure_asset('assets2/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files [production]-->
    {{-- <link href="{{ secure_asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}

    <!-- Vendor CSS Files [for development]-->
    <link href="{{ secure_asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets2/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File [prod]-->
    {{-- <link href="{{ secure_asset('assets2/css/main.css') }}" rel="stylesheet"> --}}

    <!-- Main CSS File  [dev]-->
    <link href="{{ secure_asset('assets2/css/main.css') }}" rel="stylesheet">

    @livewireStyles

</head>

<body class="index-page">

@yield('header')


<!-- main contents-->
@hasSection('content')
    @yield('content')
@endif

<!-- Footer -->
@hasSection('footer')
    @yield('footer')
@endif


<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

@livewireScripts

<!-- Check Custom JS -->
@hasSection('custom_js')
    @yield('custom_js')
@endif

<!-- Vendor JS Files [prod]-->
{{-- <script src="{{ secure_asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/aos/aos.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script> --}}

<!-- Vendor JS Files [dev]-->
<script src="{{ secure_asset('assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/aos/aos.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ secure_asset('assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>

<!-- Main JS File -->
<script src="assets2/js/main.js"></script>

</body>

</html>
