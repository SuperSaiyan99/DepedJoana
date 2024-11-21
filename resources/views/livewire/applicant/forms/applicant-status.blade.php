<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="p-3">
                <h3 class="text-center">
                    Your Unique Application Number is
                    <strong><i>#{{ $applicantData->applicant_code }}</i></strong>
                </h3>
                <div id="stepper1" class="bs-stepper linear">
                    <div class="bs-stepper-header" role="tablist">
                        <!-- Review Phase -->
                        <div class="step {{ $applicantData->status === 'rejected' ? 'error' : ($applicantData->status === 'reviewed' ? 'active' : '') }}" data-target="#test-l-1">
                            <button class="step-trigger" role="tab" id="stepper1trigger1"
                                    aria-controls="test-l-1"
                                    aria-selected="{{ $applicantData->status === 'reviewed' }}">
                                <span class="{{ $applicantData->status === 'rejected' ? 'fas fa-times-circle text-danger' : ($applicantData->status === 'reviewed' ? 'spinner-grow text-primary' : 'fas fa-check-circle text-success') }}"></span>
                                <span class="bs-stepper-label d-none d-md-inline {{ $applicantData->status === 'rejected' ? 'text-danger' : ($applicantData->status === 'reviewed' ? 'text-primary' : 'text-success') }}">
                                    Application On Review
                                </span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>

                        <!-- Initial Interview Phase -->
                        <div class="step {{ $applicantData->status === 'rejected' ? 'error' : ($applicantData->status === 'initial_qualified' ? 'active' : '') }}" data-target="#test-l-2">
                            <button class="step-trigger" role="tab" id="stepper1trigger2"
                                    aria-controls="test-l-2"
                                    aria-selected="{{ $applicantData->status === 'initial_qualified' || $applicantData->status === 'rejected' }}"
                                {{ $applicantData->status === 'rejected' ? '' : 'disabled' }}>
                                <i class="{{ $applicantData->status === 'rejected' ? 'fas fa-times-circle text-danger' : ($applicantData->status === 'initial_qualified' ? 'spinner-grow text-primary' : 'fas fa-hourglass-half') }}"></i>
                                <span class="bs-stepper-label d-none d-md-inline {{ $applicantData->status === 'rejected' ? 'text-danger' : ($applicantData->status === 'initial_qualified' ? 'text-primary' : '') }}">
                                    Initial Interview Phase
                                </span>
                            </button>
                        </div>
                        <div class="bs-stepper-line"></div>

                        <!-- Assessment Phase -->
                        <div class="step {{ $applicantData->status === 'rejected' ? 'error' : ($applicantData->status === 'approved' ? 'active' : '') }}" data-target="#test-l-3">
                            <button class="step-trigger" role="tab" id="stepper1trigger3"
                                    aria-controls="test-l-3"
                                    aria-selected="{{ $applicantData->status === 'approved' }}"
                                {{ $applicantData->status !== 'approved' ? 'disabled' : '' }}>
                                <i class="{{ $applicantData->status === 'rejected' ? 'fas fa-times-circle text-danger' : ($applicantData->status === 'approved' ? 'fas fa-check-circle text-success' : 'fas fa-clock') }}"></i>
                                <span class="bs-stepper-label d-none d-md-inline {{ $applicantData->status === 'rejected' ? 'text-danger' : ($applicantData->status === 'approved' ? 'text-success' : '') }}">
                                    Assessment Phase
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="bs-stepper-content mt-4">
                        <!-- Rejected Message -->
                        @if ($applicantData->status === 'rejected')
                            <div id="test-l-rejected" role="tabpanel" class="bs-stepper-pane active dstepper-block">
                                <h4 class="text-center text-danger">Application Rejected</h4>
                                <p class="text-center">Reason: {{ $applicantData->reason }}</p>
                            </div>
                        @else
                            <!-- Review Phase Content -->
                            <div id="test-l-1" role="tabpanel" class="bs-stepper-pane {{ $applicantData->status === 'reviewed' ? 'active dstepper-block' : '' }}" aria-labelledby="stepper1trigger1">
                                <h4 class="text-center">Your application is under review.</h4>
                                <p class="text-center">You will receive further instructions once the review is complete.</p>
                            </div>

                            <!-- Initial Interview Phase Content -->
                            <div id="test-l-2" role="tabpanel" class="bs-stepper-pane {{ $applicantData->status === 'initial_qualified' ? 'active dstepper-block' : '' }}" aria-labelledby="stepper1trigger2">
                                <h4 class="text-center">You have reached the Initial Interview Phase.</h4>
                                <p class="text-center">You will be contacted for the next steps.</p>
                            </div>

                            <!-- Assessment Phase Content -->
                            <div id="test-l-3" role="tabpanel" class="bs-stepper-pane {{ $applicantData->status === 'approved' ? 'active dstepper-block' : '' }}" aria-labelledby="stepper1trigger3">
                                <h4 class="text-center text-success">Application Approved!</h4>
                                <p class="text-center">Congratulations! You will receive further instructions shortly.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
