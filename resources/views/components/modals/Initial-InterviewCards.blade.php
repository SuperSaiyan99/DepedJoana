@props([
    'candidates' => [],
    'selection_boards' => [],
    ])

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
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-candidate-lists" role="tab" aria-controls="simple-candidate-lists" aria-selected="true">Applicants Qualified</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-selection-board" role="tab" aria-controls="simple-selection-board" aria-selected="false">Selection Board</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-date-schedule" role="tab" aria-controls="simple-date-schedule" aria-selected="false">Date Schedule</a>
                    </li>
                </ul>
                <div class="tab-content pt-5" id="tab-content">
                    <div class="tab-pane active" id="simple-candidate-lists" role="tabpanel" aria-labelledby="simple-tab-0">

                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>Applicant Code</th>
                                    <th>Applying For</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody class="table-group-divider">
                            @forelse($candidates as $candidate)
                                    @if($candidate->position_title === $selectedJob->position_title)
                                        <tr>
                                            <td>
                                                <span class="avatar"><i class="fas fa-user"></i></span>
                                                <a href="#">{{ $candidate->applicant_code }}</a>
                                            </td>
                                            <td>{{ $candidate->position_title }}</td>
                                            <td>{{ ucwords(str_replace('_', ' ', $candidate->status)) }}</td>
                                        </tr>
                                    @endif
                                @empty
                                <tr colspan="3">
                                    <td>missing</td>
                                </tr>
                            @endforelse
                                </tbody>
                            </table>
                        </div>

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
                              @forelse($selection_boards as $selection_board)
                                      <tr>
                                          <td>
                                              <span class="avatar"><i class="fas fa-user"></i> </span>
                                              <a href="#">{{ $selection_board->first_name . ' ' . $selection_board->middle_name . ' ' . $selection_board->last_name }}</a>
                                          </td>
                                          <td>{{ $selection_board->role_in_board }}</td>
                                          <td>{{ $selection_board->assigned_department }}</td>
                                      </tr>
                                  @empty

                                  <tr>
                                      <td>wala</td>
                                  </tr>

                              @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane" id="simple-date-schedule" role="tabpanel" aria-labelledby="simple-tab-2">

                        <div class="row">
                            <!-- Start Date -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start-date" class="form-label"><b>Vacancy Deadline</b></label>
                                    <input type="datetime-local" class="form-control" id="close-vacancy-date" placeholder="Select Publish Date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer d-flex justify-content-between">
                @if((\Auth::user()->role === 'hrmo') and true)
                    <div>
                        <button type="button" class="btn btn-success"><i class="mdi mdi-printer"></i> Print</button>
                    </div>

                    <div>
                        <button wire:click="saveModal" type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="mdi mdi-telegram"></i> Forward to HRMPSB</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
