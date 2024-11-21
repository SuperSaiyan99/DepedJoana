<div>
    <div class="row">
        @forelse ($jobPostings as $job)
            <div class="col-md-4 mb-4">
                <div class="card shadow position-relative">
                    <img src="https://pub-b7f933bab52446139bce6c73fd9a9339.r2.dev/images/kinder.png"
                         class="card-img-top" alt="{{ $job->position_title }}"/>
                    <div class="card-body">
                        <h3>{{ ucfirst($job->position_title) }} - {{ ucfirst($job->school_level) }}</h3>
                        <hr>
                        <div class="card-text">
                            <div class="mb-3">
                                <i class="fas fa-user-graduate me-2"></i>
                                <b>Education: </b><span>{{ $job->education }}</span>
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-dumbbell me-2"></i> <b>Plantilla Item No.:</b>

                                {{ str_replace('"', '', $job->plantilla_number) }}

                            </div>


                            <div class="mb-3">
                                <i class="fas fa-briefcase me-2"></i> <b>Salary Grade:</b> {{ $job->salary_grade }}
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-check-circle me-2"></i> <b>Monthly
                                    Salary:</b> {{ $job->monthly_salary }}
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-check-circle me-2"></i> <b>Place of
                                    Assignment: </b> {{ str_replace('"', '', $job->place_of_assignment) }}
                            </div>

                            <div class="mb-3">
                                <i class="fas fa-people-carry me-2"></i> <b>Number of Vacancies: </b> {{$job->number_of_vacancy  }}
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
        @empty
            <h5>List of Initial Evaluation Results will be posted here.</h5>
        @endforelse
    </div>

    @include('components.modals.Initial-InterviewCards')
</div>

