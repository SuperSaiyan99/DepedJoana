<div wire:ignore.self class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobModalLabel">{{ $selectedJob ? $selectedJob->position_title : '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-description" role="tab" aria-controls="simple-description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-selection-board" role="tab" aria-controls="simple-selection-board" aria-selected="false">Selection Board</a>
                    </li>
                    @if(\Auth::user()->role !== 'hrmpsb')
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-selection-board" role="tab" aria-controls="simple-selection-board" aria-selected="false">Selection Board</a>
                        </li>
                    @endif
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-date-schedule" role="tab" aria-controls="simple-date-schedule" aria-selected="false">Date Schedule</a>
                    </li>
                </ul>
                <div class="tab-content pt-5" id="tab-content">
                    <div class="tab-pane active" id="simple-description" role="tabpanel" aria-labelledby="simple-tab-0">

                        @if($selectedJob)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <b>Position Title:</b>
                                        <input type="text" wire:model.live="position_title" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('position_title') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Training:</b>
                                        <input type="text" wire:model.live="training" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('training') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Experience:</b>
                                        <input type="text" wire:model.live="experience" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('experience') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Eligibility:</b>
                                        <input type="text" wire:model.live="eligibility" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('eligibility') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Salary Grade:</b>
                                        <input type="text" wire:model.live="salary_grade" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('salary_grade') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Monthly Salary:</b>
                                        <input type="text" wire:model.live="monthly_salary" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('monthly_salary') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Number of Vacancies:</b>
                                        <input type="number" wire:model.live="number_of_vacancy" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('number_of_vacancy') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Is Vacancy SHS:</b>
                                        <input type="checkbox" wire:model.live="is_vacancy_shs" class="form-check-input"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <b>Education:</b>
                                        <input type="text" wire:model.live="education" class="form-control"
                                               @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                        @error('education') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="mb-3">
                                        <b>Plantilla Number:</b>
                                        @foreach($plantilla_number as $index => $plantilla)
                                            <div class="input-group mb-1">
                                                <input type="text" wire:model.live="plantilla_number.{{ $index }}"
                                                       class="form-control" @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                                @if(\Auth::user()->role === 'hrmo')
                                                    <button wire:click="removeButton({{ $index }}, 'plantilla_number')" class="btn btn-danger">-</button>
                                                @endif
                                            </div>
                                        @endforeach
                                        @error('plantilla_number') <span class="error">{{ $message }}</span> @enderror
                                        @if(\Auth::user()->role === 'hrmo')
                                            <button wire:click="addButton('plantilla_number')" class="btn btn-secondary"><i class="fa fa-plus"></i> Add Plantilla Number</button>
                                        @endif
                                    </div>

                                    @if ($selectedJob->is_vacancy_shs)
                                        <div class="mb-3">
                                            <b>Track:</b>
                                            <input type="text" wire:model.live="track" class="form-control"
                                                   @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                            @error('track') <span class="error">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="mb-3">
                                            <b>Strand:</b>
                                            <input type="text" wire:model.live="strand" class="form-control"
                                                   @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                            @error('strand') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    @else
                                        <div class="mb-3">
                                            <b>Subject:</b>
                                            @foreach($subject as $index => $subj)
                                                <div class="input-group mb-1">
                                                    <input type="text" wire:model.live="subject.{{ $index }}" class="form-control"
                                                           @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                                    @if(\Auth::user()->role === 'hrmo')
                                                        <button wire:click="removeButton({{ $index }}, 'subject')" class="btn btn-danger">-</button>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @error('subject') <span class="error">{{ $message }}</span> @enderror
                                            @if(\Auth::user()->role === 'hrmo')
                                                <button wire:click="addButton('subject')" class="btn btn-secondary"><i class="fa fa-plus"></i> Add Subject</button>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <b>Place of Assignment:</b>
                                        @foreach($place_of_assignment as $index => $place)
                                            <div class="input-group mb-1">
                                                <input type="text" wire:model.live="place_of_assignment.{{ $index }}" class="form-control"
                                                       @if(\Auth::user()->role !== 'hrmo') disabled @endif>
                                                @if(\Auth::user()->role === 'hrmo')
                                                    <button wire:click="removeButton({{ $index }}, 'place_of_assignment')" class="btn btn-danger">-</button>
                                                @endif
                                            </div>
                                        @endforeach
                                        @error('place_of_assignment') <span class="error">{{ $message }}</span> @enderror
                                        @if(\Auth::user()->role === 'hrmo')
                                            <button wire:click="addButton('place_of_assignment')" class="btn btn-secondary"><i class="fa fa-plus"></i> Add Place of Assignment</button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <b>Job Summary:</b>
                                        <textarea wire:model.live="job_summary" class="form-control"
                                                  @if(\Auth::user()->role !== 'hrmo') disabled @endif></textarea>
                                        @error('job_summary') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane" id="simple-selection-board" role="tabpanel" aria-labelledby="simple-tab-1">

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">George Washington</a>
                                    </td>
                                    <td>SuperIntendent</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">John Adams</a>
                                    </td>
                                    <td>Principal</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">Thomas Jefferson</a>
                                    </td>
                                    <td>Principal</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="simple-selection-board" role="tabpanel" aria-labelledby="simple-tab-2">

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Assign</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">George Washington</a>
                                    </td>
                                    <td>SuperIntendent</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">John Adams</a>
                                    </td>
                                    <td>Principal</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="avatar"><i class="fas fa-user"></i></span>
                                        <a href="#">Thomas Jefferson</a>
                                    </td>
                                    <td>Principal</td>
                                    <td>Ramon Magsaysay Central Elementary School</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="simple-date-schedule" role="tabpanel" aria-labelledby="simple-tab-3">

                        <div class="row">
                            <!-- Start Date -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start-date" class="form-label"><b>Close Vacancy Date</b></label>
                                    <input type="datetime-local" class="form-control" id="close-vacancy-date" placeholder="Select Publish Date">
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end-date" class="form-label"><b>Interview Date</b></label>
                                    <input type="datetime-local" class="form-control" id="interview-date" placeholder="Select Interview Date">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="modal-footer">
                @if(\Auth::user()->role === 'hrmo')
                    <button wire:click="saveModal" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
