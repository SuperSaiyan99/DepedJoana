@extends('applicants.layouts.app')

@section('navigation')
    @include('applicants.partials.navigation')
@endsection

@section('main-header-logo')
    @include('applicants.partials.main-header-logo')
@endsection

@section('sidebar')
    @include('applicants.partials.sidebar')
@endsection


@section('css')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-header {
            border-bottom: 2px solid #6c757d;
            margin-bottom: 15px;
            padding-bottom: 10px;
            color: #6c757d;
            font-weight: bold;
        }

        .form-title {
            margin-bottom: 15px;
            padding-bottom: 10px;
            color: #6c757d;
            font-weight: bold;
        }

        .form-label {
            color: #495057;
            font-weight: bold;
        }

        .btn-save {
            background-color: #6f42c1;
            color: white;
        }

        .table {
            border: 3px solid #000; /* Thick border around the table */
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: center;
            border: 3px solid #000; /* Thick border for table cells */
        }

        .table-input {
            border: none;
            text-align: center;
            width: 100%;
        }

        .checkbox-container label {
            font-size: 0.9rem;
            font-weight: normal;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type=radio] {
            transform: scale(1.5);
        }

    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css"/>

@endsection

@section('contents')

    @if(empty(session('applicantChosenVacancy')))
        <script>
            window.location.href = "{{ route('applicants.home') }}";
        </script>
    @endif
    
    <div class="page-inner">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Personal Data Sheet</h4>
                </div>
                <div class="card-body shadow p-3 rounded">

                    <!--[navigation tabs]-->
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill" href="#line-home"
                               role="tab" aria-controls="pills-home" aria-selected="true">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-family-tab" data-bs-toggle="pill" href="#line-family"
                               role="tab" aria-controls="pills-family" aria-selected="false">Family</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-education-tab" data-bs-toggle="pill" href="#line-education"
                               role="tab" aria-controls="pills-education" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-eligibility-tab" data-bs-toggle="pill" href="#line-eligibility"
                               role="tab" aria-controls="pills-eligibility" aria-selected="false">Eligibility/Qualification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-work-experience-tab" data-bs-toggle="pill"
                               href="#line-work-experience" role="tab" aria-controls="pills-work-experience"
                               aria-selected="false">Work Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-volunteer-tab" data-bs-toggle="pill" href="#line-volunteer"
                               role="tab" aria-controls="pills-volunteer" aria-selected="false">Volunteer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-training-tab" data-bs-toggle="pill" href="#line-training"
                               role="tab" aria-controls="pills-training" aria-selected="false">Training</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-others-tab" data-bs-toggle="pill" href="#line-others"
                               role="tab" aria-controls="pills-others" aria-selected="false">Others</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-questions-tab" data-bs-toggle="pill" href="#line-questions"
                               role="tab" aria-controls="pills-questions" aria-selected="false">Questions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-reference-tab" data-bs-toggle="pill" href="#line-reference"
                               role="tab" aria-controls="pills-reference" aria-selected="false">References</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-others2-tab" data-bs-toggle="pill" href="#line-declaration"
                               role="tab" aria-controls="pills-declaration" aria-selected="false">Declaration</a>
                        </li>
                    </ul>

                    <!--[contents of tab]-->
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                             aria-labelledby="line-home-tab">

                            @livewire('applicant.tab-contents.personal-information')

                        </div>
                        <div class="tab-pane fade" id="line-family" role="tabpanel" aria-labelledby="line-family-tab">

                            @livewire('applicant.tab-contents.family-form')

                        </div>
                        <div class="tab-pane fade" id="line-education" role="tabpanel"
                             aria-labelledby="line-education-tab">

                            @livewire('applicant.tab-contents.educational-background')
                        </div>
                        <div class="tab-pane fade" id="line-eligibility" role="tabpanel"
                             aria-labelledby="line-eligibility-tab">

                            @livewire('applicant.tab-contents.eligibility-form')

                        </div>
                        <div class="tab-pane fade" id="line-work-experience" role="tabpanel"
                             aria-labelledby="line-work-experience-tab">

                            @livewire('applicant.tab-contents.work-experience')

                        </div>
                        <div class="tab-pane fade" id="line-volunteer" role="tabpanel"
                             aria-labelledby="line-volunteer-tab">

                            @livewire('applicant.tab-contents.volunteer')

                        </div>
                        <div class="tab-pane fade" id="line-training" role="tabpanel"
                             aria-labelledby="line-training-tab">

                            @livewire('applicant.tab-contents.training-programs-form')

                        </div>
                        <div class="tab-pane fade" id="line-others" role="tabpanel" aria-labelledby="line-others-tab">

                            @livewire('applicant.tab-contents.other-information-form')
                        </div>
                        <div class="tab-pane fade" id="line-questions" role="tabpanel"
                             aria-labelledby="line-questions-tab">

                            @livewire('applicant.tab-contents.questions-information-form')

                        </div>

                        <div class="tab-pane fade" id="line-reference" role="tabpanel"
                             aria-labelledby="line-reference-tab">

                            @livewire('applicant.tab-contents.references-information-form')

                        </div>

                        <div class="tab-pane fade" id="line-declaration" role="tabpanel"
                             aria-labelledby="line-declaration-tab">

                            @livewire('applicant.tab-contents.declare-information-form')

                        </div>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>
    <script src="{{ asset('assets3/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <script>
        const tourGuide = localStorage.getItem('isDriveJsTourCompleted');

        if (!tourGuide) {
            const driver = window.driver.js.driver;

            const driverObj = driver({
                showProgress: true,
                showButtons: ['next', 'previous'],
                element: "#line-tab",
                steps: [
                    {
                        element: '#line-tab',
                        popover: {
                            title: "Content Tabs",
                            description: 'You can fill up your PDS here.',
                            side: "top",
                            align: 'center'
                        }
                    },
                    {
                        element: '#line-others2-tab',
                        popover: {
                            title: 'Final Submition',
                            description: 'If you\'re done, Just submit here.',
                            side: "bottom",
                            align: 'start'
                        }
                    }
                ],
                onDeselected: (Element) => {
                    localStorage.setItem('isDriveJsTourCompleted', 'true');
                }
            });

            driverObj.drive();
        }

    </script>

    <!-- Include this script to handle notifications -->
    <script>
     @if( session('message'))
        var content = {
            message: 'Turning standard Bootstrap alerts into "notify" like notifications',
            title: "Bootstrap notify",
            icon: "fa fa-bell",
        };

        Notify({
            message: content.message,
            title: content.title,
            icon: content.icon
        }, {
            type: state,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            time: 1000,
            delay: 0
        });
        @endif
    </script>
@endsection
