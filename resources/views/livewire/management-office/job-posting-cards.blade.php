<div>
    <div class="row">
        @foreach($jobPostings as $job)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                         class="card-img-top" alt="{{ $job->position_title }}"/>
                    <div class="card-body">
                        <h3>{{ $job->position_title }}</h3>
                        <hr>
                        <div class="card-text">
                            <div class="mb-3">
                                <i class="fas fa-user-graduate me-2"></i> <b>Education:</b>
                                <p>{{ $job->education }}</p>
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-dumbbell me-2"></i> <b>Training:</b> {{ $job->training }}
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-briefcase me-2"></i> <b>Experience:</b> {{ $job->experience }}
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-check-circle me-2"></i> <b>Eligibility:</b> {{ $job->eligibility }}
                            </div>
                        </div>

                        <!-- Trigger Modal -->
                        <div>
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#jobModal"
                                    wire:click="showModal({{ $job->id }})">
                                Show More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('components.modals.JobVacanciesCards')
</div>
