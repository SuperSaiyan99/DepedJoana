<div>
    <h4 class="form-header">Voluntary Work or Involvement in Civic / Non-Government / People / Voluntary Organizations</h4>
    <form wire:submit.prevent="save">
        @foreach($volunteerWorks as $index => $volunteerWork)
            <h5>Voluntary Work #{{ $index + 1 }}</h5>
            <div class="volunteer-work-item mb-4 border rounded p-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="organization_{{ $index }}" class="form-label">Name & Address of Organization (Write in full)</label>
                        <input type="text" class="form-control" id="organization_{{ $index }}" wire:model="volunteerWorks.{{ $index }}.organization">
                        @error('volunteerWorks.' . $index . '.organization') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="fromDate_{{ $index }}" class="form-label">From (mm/dd/yyyy)</label>
                        <input type="date" class="form-control" id="fromDate_{{ $index }}" wire:model="volunteerWorks.{{ $index }}.from_date">
                        @error('volunteerWorks.' . $index . '.from_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="toDate_{{ $index }}" class="form-label">To (mm/dd/yyyy)</label>
                        <input type="date" class="form-control" id="toDate_{{ $index }}" wire:model="volunteerWorks.{{ $index }}.to_date">
                        @error('volunteerWorks.' . $index . '.to_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="hours_{{ $index }}" class="form-label">Number of Hours</label>
                        <input type="number" class="form-control" id="hours_{{ $index }}" wire:model="volunteerWorks.{{ $index }}.hours">
                        @error('volunteerWorks.' . $index . '.hours') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-9">
                        <label for="position_{{ $index }}" class="form-label">Position / Nature of Work</label>
                        <input type="text" class="form-control" id="position_{{ $index }}" wire:model="volunteerWorks.{{ $index }}.position">
                        @error('volunteerWorks.' . $index . '.position') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                @if($index > 0)
                        <button type="button" wire:click="removeVolunteerWork({{ $index }})" class="btn btn-danger btn-sm">Delete Entry</button>
                @endif
            </div>
        @endforeach
        <div class="d-grid">
            <button type="button" wire:click="addVolunteerWork" class="btn btn-success mt-3">Add Voluntary Work</button>
        </div>
        <div class="mt-4 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Save and Edit Later</button>
            <button type="submit" class="btn btn-primary">Save Voluntary Work</button>
        </div>
    </form>
</div>
