<div wire:ignore.self class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobModalLabel">{{ $selectedJob ? $selectedJob->position_title : '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($selectedJob)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <b>Position Title:</b>
                                <input type="text" wire:model.live="position_title" class="form-control">
                                @error('position_title') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Training:</b>
                                <input type="text" wire:model.live="training" class="form-control">
                                @error('training') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Experience:</b>
                                <input type="text" wire:model.live="experience" class="form-control">
                                @error('experience') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Eligibility:</b>
                                <input type="text" wire:model.live="eligibility" class="form-control">
                                @error('eligibility') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Salary Grade:</b>
                                <input type="text" wire:model.live="salary_grade" class="form-control">
                                @error('salary_grade') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Monthly Salary:</b>
                                <input type="text" wire:model.live="monthly_salary" class="form-control">
                                @error('monthly_salary') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Number of Vacancies:</b>
                                <input type="text" wire:model.live="number_of_vacancy" class="form-control">
                                @error('number_of_vacancy') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Is Vacancy SHS:</b>
                                <input type="checkbox" wire:model.live="is_vacancy_shs" class="form-check-input"
                                    {{ $selectedJob->is_vacancy_shs ? 'checked' : '' }} >
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <b>Education:</b>
                                <input type="text" wire:model.live="education"
                                       class="form-control">
                                @error('education') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <b>Plantilla Number:</b>
                                @foreach($plantilla_number as $index => $plantilla)
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model.live="plantilla_number.{{ $index }}"
                                               class="form-control">
                                        <button wire:click="removeButton({{ $index }}, 'plantilla_number')"
                                                class="btn btn-danger">-
                                        </button>
                                    </div>
                                @endforeach
                                @error('plantilla_number') <span class="error">{{ $message }}</span> @enderror
                                <button wire:click="addButton('plantilla_number')" class="btn btn-secondary"><i
                                        class="fa fa-plus"></i> Add
                                    Plantilla Number
                                </button>
                            </div>

                            @if ($selectedJob->is_vacancy_shs)
                                <div class="mb-3">
                                    <b>Track:</b>
                                    <input type="text" wire:model.live="track" class="form-control">
                                    @error('track') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <b>Strand:</b>
                                    <input type="text" wire:model.live="strand" class="form-control">
                                    @error('strand') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            @else
                                <div class="mb-3">
                                    <b>Subject:</b>
                                    @foreach($subject as $index => $subj)
                                        <div class="input-group mb-1">
                                            <input type="text" wire:model.live="subject.{{ $index }}"
                                                   class="form-control">
                                            <button wire:click="removeButton({{ $index }}, 'subject')"
                                                    class="btn btn-danger">-
                                            </button>
                                        </div>
                                    @endforeach
                                    @error('subject') <span class="error">{{ $message }}</span> @enderror
                                    <button wire:click="addButton('subject')" class="btn btn-secondary"><i
                                            class="fa fa-plus"></i> Add Subject
                                    </button>
                                </div>
                            @endif

                            <div class="mb-3">
                                <b>Place of Assignment:</b>
                                @foreach($place_of_assignment as $index => $place)
                                    <div class="input-group mb-1">
                                        <input type="text" wire:model.live="place_of_assignment.{{ $index }}"
                                               class="form-control">
                                        <button wire:click="removeButton({{ $index }}, 'place_of_assignment')"
                                                class="btn btn-danger">-
                                        </button>
                                    </div>
                                @endforeach
                                @error('place_of_assignment') <span class="error">{{ $message }}</span> @enderror
                                <button wire:click="addButton('place_of_assignment')" class="btn btn-secondary"><i
                                        class="fa fa-plus"></i> Add
                                    Place of Assignment
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <b>Job Summary:</b>
                                <textarea wire:model.live="job_summary" class="form-control"></textarea>
                                @error('job_summary') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                @endif
            </div>

            <div class="modal-footer">
                <button wire:click="saveModal" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
