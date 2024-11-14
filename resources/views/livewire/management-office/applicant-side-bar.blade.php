<div>
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
                        @forelse ($applicants as $applicant)
                            <a
                                wire:click.prevent="SelectedApplicant({{ $applicant->applicant_id }})"
                                class="list-group-item list-group-item-action d-flex align-items-center mb-2
                                    {{ $selectedApplicantId == $applicant->applicant_id ? 'active' : '' }}"
                                style="{{ $selectedApplicantId == $applicant->applicant_id ? 'background-color: #f0f8ff;' : '' }}"
                            >
                                <input class="form-check-input me-2" type="checkbox">
                                <img src="https://picsum.photos/id/64/80" alt="Applicant Photo">
                                <div class="ms-3 text-dark">
                                    <h6 class="mb-0">{{ $applicant->first_name }} {{ $applicant->middle_name }}</h6>
                                    <small class="text-dark">Applying for {{ __('work here') }}</small>
                                    <div class="tags mt-1 text-dark">
                                        <i class="fa fa-location-arrow text-dark"></i><span> Location: {{ $applicant->place_of_birth }}</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div>
                                <div class="list-group-item list-group-item-action d-flex align-items-center mb-2">
                                    <h1>No Applicants</h1>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div wire:loading wire:target="__dispatch" class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
