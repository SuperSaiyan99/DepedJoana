<div>
    @foreach($positions as $index => $position)
        <h5>Job Position #{{ $index + 1 }}</h5>
        <div class="row gy-4 align-items-end m-3 border round p-3">


            <div class="col-12 col-md-2">
                <label for="officeLevel" class="form-label">Office Level</label>
                <select wire:model="positions.{{ $index }}.office_level" class="form-select">
                    <option value="">Select Office Level</option>
                    <option value="Central Office">Division Office</option>
                </select>
                <div style="min-height: 1.5em;">
                    @error('positions.' . $index . '.office_level')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-3">
                <label for="strandsRegion" class="form-label">CO Strands/Region</label>
                <select wire:model="positions.{{ $index }}.co_strands_region" id="strandsRegion" class="form-select">
                    <option value="">Select CO Strands/Region</option>
                    <option value="Central Office">Region XI - Davao Del Sur</option>
                </select>
                <div style="min-height: 1.5em;">
                    @error('positions.' . $index . '.co_strands_region')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-3">
                <label for="bureauOffice" class="form-label">Division/Division Office</label>
                <select wire:model="positions.{{ $index }}.division_division_office" id="bureauOffice"
                        class="form-select">
                    <option value="">Select Division/Division Office</option>
                    <option value="Office 1">Digos City</option>
                </select>
                <div style="min-height: 1.5em;">
                    @error('positions.' . $index . '.division_division_office')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-3">
                <label for="position" class="form-label">Position</label>
                <select wire:model="positions.{{ $index }}.position" id="position" class="form-select">
                    <option value="">Select Position</option>
                    @forelse ($jobVacancies as $jobVacancy)
                        <option value="{{ $jobVacancy->id }}">{{ $jobVacancy->position_title }} - {{ $jobVacancy->school_level }}</option>
                    @empty
                        <option value="">No Vacancy Available</option>
                    @endforelse
                </select>
                <div style="min-height: 1.5em;">
                    @error('positions.' . $index . '.position')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            @if(intval($index) > 0)
                <div class="col-12 col-md-1 text-center mb-4">
                    <button wire:click="removePosition({{ $index }})"
                            class="btn btn-danger btn-sm border-0 shadow-none py-2 w-100">
                        <i class="fa fa-trash-alt"></i><span>Remove</span>
                    </button>
                </div>
            @endif
        </div>
    @endforeach

    <div class="action-buttons d-flex m-5 justify-content-center">
{{--        <button wire:click="addPosition" class="btn btn-secondary me-2">Add Positions</button>--}}
        <button wire:click="submit" class="btn btn-primary"><i class="fas fa-forward"></i> Proceed to Next Step</button>
    </div>
</div>
