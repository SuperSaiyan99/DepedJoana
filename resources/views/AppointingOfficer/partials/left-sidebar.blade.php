<!-- ========== Left Sidebar Start ========== -->

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box text-center">
        <a href="index.html" class="logo logo-light d-flex align-items-center justify-content-center">
        <span class="logo-sm">
            <img src="assets/images/3.png" alt="Small Logo" height="22">
        </span>
            <span class="logo-sm">
            <img src="assets3/img/kaiadmin/2-removebg-preview.png" alt="Full Logo" class="navbar-brand img-fluid">
        </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('selection-board.home') }}">
                        <i class="mdi mdi-home-circle"></i><span
                            class="badge rounded-pill bg-primary float-end">01</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Management</li>

                <li>
                    <a href="{{ route('appointing-officer.vacancies') }}" class="waves-effect" aria-expanded="false">
                        <i class="fa fa-house"></i>
                        <span>Vacancies</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('appointing-officer.candidates') }}" class="waves-effect" aria-expanded="false">
                        <i class="fa fa-house"></i>
                        <span>Candidates</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class="waves-effect" aria-expanded="false">
                        <i class="fa fa-house"></i>
                        <span>Appointments</span>
                    </a>
                </li>

                <li class="menu-title">Reports</li>

                <li>
                    <a href="calendar.html" class="waves-effect" aria-expanded="false">
                        <i class="fa fa-house"></i>
                        <span>Reports</span>
                    </a>
                </li>



                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
