<div wire:ignore.self class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobModalLabel">{{ $selectedJob ? ucwords($selectedJob->position_title) . ' - ' . ucwords($selectedJob->school_level) : '' }}</h5>
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

                        @livewire('selection-board.candidates-initial-qualified-tab')

                    </div>
                    <div class="tab-pane" id="simple-selection-board" role="tabpanel" aria-labelledby="simple-tab-1">

                        @livewire('selection-board.selection-board-search')

                    </div>
                    <div class="tab-pane" id="simple-date-schedule" role="tabpanel" aria-labelledby="simple-tab-2">

                        @livewire('selection-board.interview-date-schedule-tab')
                    </div>
                </div>

            </div>

            <div class="modal-footer d-flex justify-content-between">
                @if((\Auth::user()->role === 'hrmo'))
                    <div>
                        <button wire:click="printPdf" type="button" class="btn btn-success"><i class="mdi mdi-printer"></i> Print IES</button>
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
