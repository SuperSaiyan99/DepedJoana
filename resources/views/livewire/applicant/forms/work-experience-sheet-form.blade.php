<div>
    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label class="form-label fw-bold">Duration</label>
            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                 data-date-autoclose="true">
                <input type="text" class="form-control" name="start" placeholder="Start Date" wire:model="start">
                <input type="text" class="form-control" name="end" placeholder="End Date" wire:model="end">
            </div>
            @error('start') <span class="text-danger">{{ $message }}</span> @enderror
            @error('end') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="position" class="form-label fw-bold">Position</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Enter position title"
                   wire:model="position">
            @error('position') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="officeUnit" class="form-label fw-bold">Name of Office/Unit</label>
            <input type="text" class="form-control" id="officeUnit" name="officeUnit"
                   placeholder="Enter office or unit name" wire:model="officeUnit">
            @error('officeUnit') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="supervisor" class="form-label fw-bold">Immediate Supervisor</label>
            <input type="text" class="form-control" id="supervisor" name="supervisor"
                   placeholder="Enter supervisor name" wire:model="supervisor">
            @error('supervisor') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="agency" class="form-label fw-bold">Name of Agency/Organization and Location</label>
            <input type="text" class="form-control" id="agency" name="agency"
                   placeholder="Enter agency or organization name" wire:model="agency">
            @error('agency') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="accomplishments" class="form-label fw-bold">List of Accomplishments and Contributions (if
                any)</label>
            <textarea class="form-control" id="accomplishments" name="accomplishments" rows="3"
                      placeholder="Enter accomplishments" wire:model="accomplishments"></textarea>
            @error('accomplishments') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="duties" class="form-label fw-bold">Summary of Actual Duties</label>
            <div wire:ignore>
                <div wire:model="duties"
                     class="min-h-fit h-48 "
                     name="duties"
                     id="editor">
                </div>
            </div>
            @error('duties') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Save Work Experience</button>
        </div>
    </form>
</div>

