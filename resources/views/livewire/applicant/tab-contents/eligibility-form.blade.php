<div>
    <h4>Eligibility & Qualifications</h4>
    <form wire:submit.prevent="save">
        @foreach ($eligibilities as $index => $eligibility)
            <div class="row mb-3" wire:key="eligibility-{{ $index }}">
                <div class="col-lg-2 mt-3">
                    <label for="career_service_{{ $index }}" class="form-label">Eligibility</label>
                    <select class="form-select" id="career_service_{{ $index }}" wire:model="eligibilities.{{ $index }}.career_service">
                        <option value="">Select</option>
                        <option value="CES">Career Executive Service</option>
                        <option value="Board">Board/Bar</option>
                        <!-- Add other options as needed -->
                    </select>
                </div>
                <div class="col-lg-2 mt-3">
                    <label for="eligibility_rating_{{ $index }}" class="form-label">Rating (If Applicable)</label>
                    <input type="number" class="form-control" id="eligibility_rating_{{ $index }}" wire:model="eligibilities.{{ $index }}.eligibility_rating">
                </div>
                <div class="col-lg-2 mt-3">
                    <label for="date_of_exam_{{ $index }}" class="form-label">Date of Examination/ Conferment</label>
                    <input type="date" class="form-control" id="date_of_exam_{{ $index }}" wire:model="eligibilities.{{ $index }}.date_of_exam">
                </div>
                <div class="col-lg-2 mt-3">
                    <label for="place_of_exam_{{ $index }}" class="form-label">Place of Examination/ Conferment</label>
                    <input type="text" class="form-control" id="place_of_exam_{{ $index }}" wire:model="eligibilities.{{ $index }}.place_of_exam">
                </div>
                <div class="col-lg-2 mt-3">
                    <label for="license_number_{{ $index }}" class="form-label">License (If applicable) - Number</label>
                    <input type="text" class="form-control" id="license_number_{{ $index }}" wire:model="eligibilities.{{ $index }}.license_number">
                </div>
                <div class="col-lg-2 mt-3">
                    <label for="date_of_validity_{{ $index }}" class="form-label">Date of Validity</label>
                    <input type="date" class="form-control" id="date_of_validity_{{ $index }}" wire:model="eligibilities.{{ $index }}.date_of_validity">
                </div>
                <div class="col-lg-2 align-self-center mt-3">
                    <button type="button" class="btn btn-danger" wire:click="removeEligibility({{ $index }})">Delete</button>
                </div>
            </div>
        @endforeach

        <div class="d-grid mt-3">
            <button type="button" class="btn btn-success" wire:click="addEligibility">Add Civil Service Eligibility</button>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Save and Edit Later</button>
            <button type="submit" class="btn btn-primary">Save Civil Service Data</button>
        </div>
    </form>
</div>
