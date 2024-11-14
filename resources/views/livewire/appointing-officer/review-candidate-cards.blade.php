<div> <!-- Root element wrapping everything -->
    <div class="row">
        <!-- Sidebar: List of candidates -->
        <div class="col-md-4">
            <div class="card" style="height: 80vh;">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item submenu" role="presentation">
                            <a class="nav-link active" id="" data-bs-toggle="pill"
                               href="" role="tab" aria-controls="pills-home"
                               aria-selected="true">Candidates</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade active show" id="" role="tabpanel" aria-labelledby="line-home-tab">
                            <div class="list-group">
                                @foreach ($applicants as $applicant)
                                    <div>
                                        <div
                                            class="list-group-item list-group-item-action d-flex align-items-center mb-2">
                                            <input class="form-check-input me-2" type="checkbox">
                                            <img src="https://picsum.photos/id/64/80" alt="Applicant Photo">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $applicant->first_name }} {{ $applicant->middle_name }}</h6>
                                                <small>Applying for {{ __('work here') }}</small>
                                                <div class="tags mt-1">
                                                    <i class="fa fa-location-arrow"></i><span> Location: {{ $applicant->place_of_birth }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main profile section -->
        <div class="col-md-8">
            <div class="card" style="height: 80vh;">
                <div class="card-body" style="height: 70vh; overflow-y: auto;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1>Applicant #{{ Auth()->id() }}</h1>
                        <div class="p-2">
                            <div class="btn btn-success mr-2"><i class="fa fa-check"></i> Qualified</div>
                            <div class="btn btn-danger"><i class="fa fa-ban"></i> Disqualified</div>
                        </div>
                    </div>
                    <hr>
                        <div class="d-flex align-items-center">
                        <img src="https://picsum.photos/id/64/80" alt="Applicant Photo">
                        <div class="ms-3">
                            <h4 class="mb-0">Joana</h4>
                            <p class="mb-0">Leader at Al-Qaeda</p>
                        </div>
                    </div>
                    <hr>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-information" role="tab" aria-controls="simple-information" aria-selected="true">Information</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-selection-board-review" role="tab" aria-controls="simple-selection-board-review" aria-selected="false">Assessment Score</a>
                        </li>

                    </ul>
                    <div class="tab-content pt-5" id="tab-content">
                        <div class="tab-pane active" id="simple-information" role="tabpanel" aria-labelledby="simple-tab-0">

                            <h5>About</h5>
                            <p class="text-dark">
                                My work lies at the intersection of design thinking and social impact. I am driven by my desire
                                to help communities lead healthy, fulfilling lives.
                                I leverage design research to unearth best practices, reveal hidden patterns, and uncover untold
                                stories.
                            </p>
                            <hr>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5>Personal Data Sheet</h5>
                            </div>

                            <div class="timeline-item mt-3">
                                <div class="d-flex align-items-center">
                                    <div class="row">
                                        <div class="mb-3">
                                            <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill"
                                                       href="#line-home" role="tab" aria-controls="pills-home"
                                                       aria-selected="true">Personal</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-family-tab" data-bs-toggle="pill"
                                                       href="#line-family" role="tab" aria-controls="pills-family"
                                                       aria-selected="false">Family</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-education-tab" data-bs-toggle="pill"
                                                       href="#line-education" role="tab" aria-controls="pills-education"
                                                       aria-selected="false">Education</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-eligibility-tab" data-bs-toggle="pill"
                                                       href="#line-eligibility" role="tab" aria-controls="pills-eligibility"
                                                       aria-selected="false">Eligibility/Qualification</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-work-experience-tab" data-bs-toggle="pill"
                                                       href="#line-work-experience" role="tab"
                                                       aria-controls="pills-work-experience" aria-selected="false">Work
                                                        Experience</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-volunteer-tab" data-bs-toggle="pill"
                                                       href="#line-volunteer" role="tab" aria-controls="pills-volunteer"
                                                       aria-selected="false">Volunteer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-training-tab" data-bs-toggle="pill"
                                                       href="#line-training" role="tab" aria-controls="pills-training"
                                                       aria-selected="false">Training</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-others-tab" data-bs-toggle="pill"
                                                       href="#line-others" role="tab" aria-controls="pills-others"
                                                       aria-selected="false">Others</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-questions-tab" data-bs-toggle="pill"
                                                       href="#line-questions" role="tab" aria-controls="pills-questions"
                                                       aria-selected="false">Questions</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-reference-tab" data-bs-toggle="pill"
                                                       href="#line-reference" role="tab" aria-controls="pills-reference"
                                                       aria-selected="false">References</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="line-declaration-tab" data-bs-toggle="pill"
                                                       href="#line-declaration" role="tab" aria-controls="pills-declaration"
                                                       aria-selected="false">Declaration</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-7 col-md-8">
                                            <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                                <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                                     aria-labelledby="line-home-tab">
                                                    <p>soon Joana</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-family" role="tabpanel"
                                                     aria-labelledby="line-family-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-education" role="tabpanel"
                                                     aria-labelledby="line-education-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-eligibility" role="tabpanel"
                                                     aria-labelledby="line-eligibility-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-work-experience" role="tabpanel"
                                                     aria-labelledby="line-work-experience-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-volunteer" role="tabpanel"
                                                     aria-labelledby="line-volunteer-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-training" role="tabpanel"
                                                     aria-labelledby="line-training-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-others" role="tabpanel"
                                                     aria-labelledby="line-others-tab">
                                                    <p>soon here</p>
                                                </div>
                                                <div class="tab-pane fade" id="line-questions" role="tabpanel"
                                                     aria-labelledby="line-questions-tab">
                                                    <p>soon here</p>
                                                </div>

                                                <div class="tab-pane fade" id="line-reference" role="tabpanel"
                                                     aria-labelledby="line-reference-tab">
                                                    <p>soon here</p>
                                                </div>

                                                <div class="tab-pane fade" id="line-declaration" role="tabpanel"
                                                     aria-labelledby="line-declaration-tab">
                                                    <p>soon here</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div>
                                <h5>Uploaded Documents</h5>

                                @livewire('management-office.pdf-carousel')
                            </div>


                        </div>
                        <div class="tab-pane" id="simple-selection-board-review" role="tabpanel" aria-labelledby="simple-tab-1">

                                        <h1>next life na ni</h1>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
