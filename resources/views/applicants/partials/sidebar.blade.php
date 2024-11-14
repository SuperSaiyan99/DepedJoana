<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">

    @include('applicants.partials.sidebar-logo')

        <div class="sidebar-wrapper scrollbar scrollbar-inner">

            <div class="sidebar-content">

                <ul class="nav nav-secondary">

                        <li class="nav-item active">
                            <a href="{{ route('applicants.applicant-status') }}">
                                <i class="fas fa-desktop"></i>
                                <p>Applicant Status</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <h4 class="text-section">Components</h4>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('applicants.applicant-status') }}">
                                <i class="fas fa-desktop"></i>
                                <p>Applicant Status</p>

                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{  route('applicants.work-experience-sheet') }}">
                                <i class="fas fa-desktop"></i>
                                <p>Work Experience Sheet</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('applicants.applicant-upload') }}">
                                <i class="fas fa-desktop"></i>
                                <p>Upload Documents</p>
                            </a>
                        </li>
                    <li class="nav-item ">
                        <a href="{{ route('applicants.personal-data-sheet') }}">
                            <i class="fas fa-desktop"></i>
                            <p>Personal data sheet</p>
                        </a>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
