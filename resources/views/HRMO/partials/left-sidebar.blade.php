<!-- ========== Left Sidebar Start ========== -->

<div class="vertical-menu">

            <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-light d-flex align-items-center justify-content-center">
        <span class="logo-sm">
            <img src="{{ asset('assets/images/3.png') }}" alt="Logo" class="img-fluid" style="height: 22px;">
        </span>
         <span class="logo">
            <img src="" alt="navbar brand"
                 class="navbar-brand w-75">
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
                    <a href="{{ route('management-officer.home') }}">
                        <i class="mdi mdi-home-circle"></i><span
                            class="badge rounded-pill bg-primary float-end">01</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="menu-title">Management</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Applications</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('management-officer.review-application') }}">Review Candidates</a></li>
                        <li><a href="{{ route('management-officer.initial-evaluation') }}">Initial Evaluation
                                Results</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Vacancies</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('management-officer.manage-application') }}">Active Vacancies</a>
                        <li><a href="{{ route('management-officer.vacancy-logs') }}">Vacancy Logs</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Candidates</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Candidates</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('management-officer.candidate-logs') }}">Candidate Logs</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-title">Reports</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('management-officer.applicant-tracking') }}">Applicant Tracking</a></li>
                        <li><a href="{{ route('management-officer.comparative-assessment') }}">Comparative
                                Assessment</a></li>
                    </ul>



                    <!--[Soon]-->
                    {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                    {{--                        <li><a href="{{ route('management-officer.comparative-assessment') }}">Vacancy Report</a></li>--}}
                    {{--                    </ul>--}}
                    {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                    {{--                        <li><a href="{{ route('management-officer.comparative-assessment') }}">Recruitment Metrics</a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}


                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
