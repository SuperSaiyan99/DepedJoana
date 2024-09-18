<!-- HEADER -->

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ __('/') }}" class="logo d-flex align-items-center me-auto">
            <!-- Logo Symbol -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">JOANA</h1>
        </a>

        <!-- Logo Symbol -->
        @include('guest.partials.nav')


        <!-- YT -->
        @guest
            @if (Route::has('register'))
                <a class="btn-getstarted" href="{{ route('register') }}">Get Started</a>
            @endif
        @else
            @php
                $roleRoutes = [
                    'applicant' => 'applicant/home',
                    'superadmin' => 'super-admin/home',
                    'hrmpsb' => 'selection-board/home',
                    'hrmo' => 'management-officer/home',
                    'appointing_officer' => 'appointing-officer/home',
                  ];
            @endphp

            @if(isset($roleRoutes[Auth::user()->role]))
                <a class="btn-getstarted" href="{{ __($roleRoutes[Auth::user()->role]) }}">
                    Dashboard
                </a>
            @endif

        @endguest


    </div>
</header>
