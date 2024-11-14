<!-- Approval Modal -->
<div
    x-data="{ show: false }"
    x-init="@this.on('close-approval-modal', () => { $('#approvalModal').modal('hide') })"
    class="modal fade" id="approvalModal"
    tabindex="-1"
    aria-labelledby="approvalModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">Approve Applicant</h5>
                <button  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Criteria</th>
                        <th class="w-25">Status</th>
                        <th class="w-50">Increment Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Training</td>
                        <td>
                            <select wire:model="criteria.training.status" class="form-select">
                                <option disabled value="">Select Decision</option>
                                <option value="qualified">Qualified</option>
                                <option value="disqualified">Disqualified</option>
                            </select>
                        </td>
                        <td>
                            <select wire:model="criteria.training.increment_level" id="exampleSelect" class="form-select">
                                <option disabled value="">Select Increment Value</option>
                                @forelse($increment_values_training as $index => $increment_value)

                                    <option value="{{ intval($increment_value->level_increments) }}">
                                        Increment Level {{ $increment_value->level_increments . ': ' }}
                                        (
                                        {{  $increment_value->from_description . ' - ' . $increment_value->to_description }}
                                        )
                                    </option>
                                @empty
                                    <option>No increment values available.</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Education</td>
                        <td>
                            <select wire:model="criteria.education.status" class="form-select">
                                <option disabled value="">Select Decision</option>
                                <option value="qualified">Qualified</option>
                                <option value="disqualified">Disqualified</option>
                            </select>
                        </td>
                        <td>
                            <select wire:model="criteria.education.increment_level" class="form-select">
                                <option disabled value="">Select Increment Value</option>
                                @forelse($increment_values_education as $index => $increment_value)

                                    <option value="{{ intval($increment_value->level_increments) }}">
                                           Increment Level {{ $increment_value->level_increments . ': ' }}
                                        (
                                            {{  $increment_value->from_description . ' - ' . $increment_value->to_description }}
                                        )
                                    </option>
                                @empty
                                    <option>No increment values available.</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Experience</td>
                        <td>
                            <select wire:model="criteria.experience.status" class="form-select">
                                <option disabled value="">Select Decision</option>
                                <option value="qualified">Qualified</option>
                                <option value="disqualified">Disqualified</option>
                            </select>
                        </td>
                        <td>
                            <select wire:model="criteria.experience.increment_level" class="form-select">
                                <option disabled value="">Select Increment Value</option>
                                @forelse($increment_values_workExperience as $index => $increment_value)

                                    <option value="{{ intval($increment_value->level_increments) }}">
                                           Increment Level {{ $increment_value->level_increments . ': ' }}
                                        (
                                            {{  $increment_value->from_description . ' - ' . $increment_value->to_description }}
                                        )
                                    </option>
                                @empty
                                    <option>No increment values available.</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button wire:click="approveApplicant" type="button" class="btn btn-success" id="approveBtn">Approve Applicant</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
