<!-- ========== Left Sidebar Start ========== -->

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box text-center">
        <a href="index.html" class="logo logo-light d-flex align-items-center justify-content-center">
        <span class="logo-sm">
            <img src="http://127.0.0.1:8000/assets/images/3.png" alt="Small Logo" height="22">
        </span>
            <span class="logo-sm">
            <img src="http://127.0.0.1:8000/assets3/img/kaiadmin/2-removebg-preview.png" alt="Full Logo" class="navbar-brand img-fluid">
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
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Applications</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('selection-board.candidate-assessment') }}">Review Candidates</a></li>
                        <li><a href="{{ route('selection-board.review-rank-status') }}">Review Candidate Status</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle"></i>
                        <span>Vacancies</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('selection-board.manage-application') }}">Manage Vacancy Posting</a>
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
                        <li><a href="{{ route('selection-board.applicant-tracking') }}">Applicant Tracking</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('selection-board.initial-evaluation') }}">Initial Evaluation</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('selection-board.comparative-assessment') }}">Comparative
                                Assessment</a></li>
                    </ul>


                    <!--[Soon]-->
                    {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                    {{--                        <li><a href="{{ route('selection-board.comparative-assessment') }}">Vacancy Report</a></li>--}}
                    {{--                    </ul>--}}
                    {{--                    <ul class="sub-menu" aria-expanded="false">--}}
                    {{--                        <li><a href="{{ route('selection-board.comparative-assessment') }}">Recruitment Metrics</a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}


                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
