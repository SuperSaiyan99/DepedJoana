<div>
    @foreach($positions as $index => $position)
        <h5>Job Position #{{ $index + 1 }}</h5>
        <div class="row gy-4 align-items-center m-3 border round p-3">

            <div class="col-12 col-md-3">
                <label for="districtId" class="form-label">School District</label>
                <select wire:model="positions.{{ $index }}.school_district" id="districtId"
                        class="form-select">
                    <option value="">Select School District</option>
                    <option value="digos_occidental">Digos Occidental</option>
                    <option value="digos_oriental">Digos Oriental</option>
                    <option value="digos_district">Digos South District</option>
                    <option value="digos_apo">Digos Apo</option>
                </select>
                <div style="min-height: 1.5em;">
                    @error('positions.' . $index . '.division_division_office')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-3">
                <label for="position" class="form-label">Vacancy Position Available</label>
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

        </div>
    @endforeach

    <div class="action-buttons d-flex m-5 justify-content-center">
{{--        <button wire:click="addPosition" class="btn btn-secondary me-2">Add Positions</button>--}}
        <button wire:click="submit" class="btn btn-primary"><i class="fas fa-forward"></i> Proceed to Next Step</button>
    </div>
</div>
