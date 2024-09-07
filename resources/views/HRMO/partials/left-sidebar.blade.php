<!-- ========== Left Sidebar Start ========== -->

<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">

        <span class="logo-sm">
                            <img src="{{ secure_asset('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
        <span class="logo-lg">
                            <img src="{{ secure_asset('assets/images/logo-dark.png') }}" alt="" height="20">
                        </span>

        <a href="{{ route('home') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ secure_asset('assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
            <span class="logo-lg">
                                <img src="{{ secure_asset('assets/images/logo-light.png') }}" alt="" height="20">
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
                    <a href="{{ route('home') }}">
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
                        <li><a href="{{ route('manage-application.index') }}">Manage Applications</a></li>
                        <li><a href="{{ route('review-application.index') }}">Review Applications</a></li>
                        <li><a href="{{ route('review-rank-status.index') }}">Review Ranking Status</a></li>
                    </ul>
                </li>

                <li class="menu-title">Recruitment Management</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Vacancy Posting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Manage Vacancies</a></li>
                        <li><a href="">Applicant Tracking</a></li>

                    </ul>
                </li>

                <li class="menu-title">Selection Process:</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Initial Evaluation</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Review Initial Evaluation Results</a></li>
                        <li><a href="">Manage Qualified/Disqualified Applicants</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Comparative Assessment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Monitor HRMPSB Deliberations</a></li>
                        <li><a href="">Review Comparative Assessment Results</a></li>
                        <li><a href="">Generate CAR/CAR-RQA Reports</a></li>
                    </ul>
                </li>

                <li class="menu-title">Appointment & Placement:</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Placement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Assign Positions</a></li>
                        <li><a href="">Track Placement History</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-tie"></i>
                        <span>Appointment Approval</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Review Appointment Recommendations</a></li>
                        <li><a href="">Approve/Reject Appointments</a></li>
                    </ul>
                </li>

                <li class="menu-title">Reports & Analytics</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-flask"></i>
                        <span>Recruitment Metrics</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="">Time-to-Hire</a></li>
                        <li><a href="">Selection Ratios</a></li>
                        <li><a href="">Vacancy Fill Rate</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
