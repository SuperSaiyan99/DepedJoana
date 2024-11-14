<div>
    @if($applicant)
        <div class="card" style="height: 80vh;">
            <div class="card-body" style="height: 70vh; overflow-y: auto;" wire:loading.class="opacity-50" wire:loading.remove>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1>Applicant #{{ $applicant->applicant_code }}</h1>
                    <div class="p-2">
                        <button class="btn btn-success mr-2" data-bs-toggle="modal" data-bs-target="#approvalModal" onclick="openApprovalModal('{{ $applicant->id }}')">
                            <i class="fa fa-check"></i> Qualified
                        </button>
                        <button class="btn btn-danger" onclick="confirmDisapproval('{{ $applicant->id }}')">
                            <i class="fa fa-ban"></i> Disqualified
                        </button>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-center">
                    <img src="https://picsum.photos/id/64/80" alt="Applicant Photo">
                    <div class="ms-3">
                        <h4 class="mb-0">{{  $applicant->first_name . ' ' . $applicant->middle_name[0] . '. ' . $applicant->surname . ', ' . $applicant->name_extension }}</h4>
                        <p class="mb-0">Applying for: <strong>{{ $applicant->position_title }}</strong></p>
                    </div>
                </div>
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

                            <div class="col-7 col-md-12">
                                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                                    <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                         aria-labelledby="line-home-tab">
                                                <div class="form-header form-header mt-4">Applicant Information</div>
                                                    <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="surname" class="form-label">Surname</label>
                                                        <input type="text" class="form-control" id="surname" value="{{ $applicant->surname }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="firstname" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="first_name" value="{{ $applicant->first_name }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="middlename" class="form-label">Middle Name</label>
                                                        <input type="text" class="form-control" id="middle_name" value="{{ $applicant->middle_name }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="date_of_birth" class="form-label">Date of Birth (yyyy-mm-dd)</label>
                                                        <input type="date" class="form-control" id="date_of_birth" value="{{ $applicant->date_of_birth }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="name_extension" class="form-label">Name Extension</label>
                                                        <select class="form-select" id="name_extension">
                                                            <option selected>{{ $applicant->name_extension }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="place_of_birth" class="form-label">Place of Birth</label>
                                                        <input type="text" class="form-control" id="place_of_birth" value="{{ $applicant->place_of_birth }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="sex" class="form-label">Sex</label>
                                                        <select class="form-select" id="sex">
                                                            <option selected>{{ $applicant->sex }} </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="civil_status" class="form-label">Civil Status</label>
                                                        <select class="form-select" id="civil_status">
                                                            <option selected>{{ $applicant->civil_status }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="citizenship" class="form-label">Citizenship</label>
                                                        <select type="text" class="form-control" id="citizenship">
                                                            <option selected>{{ $applicant->citizenship }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="citizenship_type" class="form-label">Citizenship Type</label>
                                                        <select type="text" class="form-control" id="citizenship_type">
                                                            <option selected>{{ $applicant->citizenship_type }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="country_if_dual_citizenship" class="form-label">Country If Dual Citizenship</label>
                                                        <select type="text" class="form-control" id="country_if_dual_citizenship">
                                                            <option selected>{{ $applicant->country_if_dual_citizenship }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="height" class="form-label">Height (m)</label>
                                                        <input type="number" class="form-control" id="height" value="{{ $applicant->height }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="weight" class="form-label">Weight (kg)</label>
                                                        <input type="number" class="form-control" id="weight" value="{{ $applicant->weight }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="blood_type" class="form-label">Blood Type</label>
                                                        <input type="text" class="form-control" id="blood_type" value="{{ $applicant->blood_type }}">
                                                    </div>

                                                    <div class="form-header form-header mt-5">Residential Address</div>


                                                    <div class="col-md-6">
                                                        <label for="house_number" class="form-label">House/Block/Lot No.</label>
                                                        <input type="text" class="form-control" id="house_number" value="{{ $applicant->house_number }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="street" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="street" value="{{ $applicant->street }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="village" class="form-label">Village</label>
                                                        <input type="text" class="form-control" id="village" value="{{ $applicant->village }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="barangay" class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" id="barangay" value="{{ $applicant->barangay }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="City" class="form-label">City/Municipality</label>
                                                        <select class="form-select" id="City">
                                                            <option selected>{{ $applicant->city }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="province" class="form-label">Province</label>
                                                        <select class="form-select" id="province">
                                                            <option selected>{{ $applicant->province }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="zipcode_code" class="form-label">ZIP Code</label>
                                                        <input type="text" class="form-control" id="zipcode" value="{{ $applicant->zipcode_code }}">
                                                    </div>

                                                    <div class="form-header form-header mt-5">Permanent Address</div>


                                                    <div class="col-md-6">
                                                        <label for="house_number" class="form-label">House/Block/Lot No.</label>
                                                        <input type="text" class="form-control" id="house_number" value="{{ $applicant->house_number }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="street" class="form-label">Street</label>
                                                        <input type="text" class="form-control" id="street" value="{{ $applicant->street }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="village" class="form-label">Village</label>
                                                        <input type="text" class="form-control" id="village" value="{{ $applicant->village }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="barangay" class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" id="barangay" value="{{ $applicant->barangay }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="City" class="form-label">City/Municipality</label>
                                                        <select class="form-select" id="City">
                                                            <option selected>{{ $applicant->city }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="province" class="form-label">Province</label>
                                                        <select class="form-select" id="province">
                                                            <option selected>{{ $applicant->province }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="zipcode_code" class="form-label">ZIP Code</label>
                                                        <input type="text" class="form-control" id="zipcode" value="{{ $applicant->zipcode_code }}">
                                                    </div>


                                                    <div class="form-header form-header mt-5">Contact Information</div>


                                                    <div class="col-md-6">
                                                        <label for="telephone_no" class="form-label">Telephone No.</label>
                                                        <input type="text" class="form-control" id="telephone_no" value="{{ $applicant->telephone_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="mobile_no" class="form-label">Mobile No.</label>
                                                        <input type="text" class="form-control" id="mobile_no" value="{{ $applicant->mobile_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">E-mail address</label>
                                                        <input type="email" class="form-control" id="email" value="{{ $applicant->email_address }}">
                                                    </div>

                                                    <div class="form-header form-header mt-5">Applicant Identification</div>

                                                    <div class="col-md-6">
                                                        <label for="gsis_id_no" class="form-label">GSIS ID No.</label>
                                                        <input type="text" class="form-control" id="gsis_id_no" value="{{ $applicant->gsis_id_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="pag_ibig_id_no" class="form-label">PAG-IBIG ID No.</label>
                                                        <input type="text" class="form-control" id="pag_ibig_id_no" value="{{ $applicant->pag_ibig_id_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="philhealth_no" class="form-label">PhilHealth No.</label>
                                                        <input type="text" class="form-control" id="philhealth_no" value="{{ $applicant->philhealth_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="sss_no" class="form-label">SSS No.</label>
                                                        <input type="text" class="form-control" id="sss_no" value="{{ $applicant->sss_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="agency_employee_no" class="form-label">Agency Employee No.</label>
                                                        <input type="text" class="form-control" id="agency_employee_no" value="{{ $applicant->agency_employee_no }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="tin_no" class="form-label">TIN</label>
                                                        <input type="text" class="form-control" id="tin_no" value="{{ $applicant->tin_no }}">
                                                    </div>
                                                </div>


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

{{--                    @livewire('management-office.pdf-carousel')--}}
                </div>
            </div>
            <!-- Spinner Overlay -->
            <div class="position-absolute top-50 start-50 translate-middle" wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        @include('components.modals.ApprovedConfirmationModal')

        @include('components.Toasts.ApplicantApprovedToast')
    @else
        <div class="card" style="height: 80vh;">
            <div class="card-body" style="height: 70vh; overflow-y: auto;">
                <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('assets/images/maintenance.png') }}" alt="Placeholder Image" class="mb-4 opacity-50">
                    <h3 class="text-muted">No Applicant Selected</h3>
                    <p class="text-muted">Please select an applicant from the sidebar to view their details.</p>
                </div>
            </div>
        </div>
@endif
</div>



@script
        <script>
            let applicantId = null;

            function openApprovalModal(id) {
                applicantId = id;
            }

            document.getElementById('approveBtn').addEventListener('click', function() {

                const formData = {
                    training_status: document.getElementById('training_status').value,
                    training_increment: document.getElementById('training_increment').value,
                    education_status: document.getElementById('education_status').value,
                    education_increment: document.getElementById('education_increment').value,
                    experience_status: document.getElementById('experience_status').value,
                    experience_increment: document.getElementById('experience_increment').value,
                };

                // Send the data to the Livewire
                @this.call('approveApplicant', applicantId, formData);

                // Close the modal
                var approvalModal = new bootstrap.Modal(document.getElementById('approvalModal'));
                approvalModal.hide();
            });

            document.addEventListener('DOMContentLoaded', function () {
                window.addEventListener('show-toast', event => {
                    let toastElement = document.getElementById('liveToast');
                    let toastBody = toastElement.querySelector('.toast-body');
                    toastBody.textContent = event.detail.message;

                    let toast = new bootstrap.Toast(toastElement);
                    toast.show();
                });
            });

            window.confirmDisapproval = function(applicantId) {
                Swal.fire({
                    title: 'Disapprove Applicants',
                    icon: 'warning',
                    html: '<div id="quill-editor" style="height: 50vh;"></div>',
                    showCancelButton: true,
                    confirmButtonText: 'Disapprove',
                    customClass: {
                        popup: 'swal-large'
                    },
                    didOpen: () => {
                        window.quill = new Quill('#quill-editor', {
                            theme: 'snow',
                            placeholder: 'Enter reason for disapproval...',
                            modules: {
                                toolbar: [
                                    [{ 'header': [1, 2, false] }],
                                    ['bold', 'italic', 'underline'],
                                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                                    ['clean']  // Remove formatting button
                                ]
                            }
                        });
                    },
                    preConfirm: () => {
                        if (window.quill) {
                            return {
                                reason: window.quill.root.innerHTML
                            };
                        } else {
                            return {
                                reason: ''
                            };
                        }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        let reason = result.value.reason;
                        if (reason.trim() !== '') {
                            @this.call('rejectApplicant', reason);
                        } else {
                            Swal.fire('Error', 'Disapproval reason is required', 'error');
                        }
                    }
                });
            };
        </script>
@endscript
