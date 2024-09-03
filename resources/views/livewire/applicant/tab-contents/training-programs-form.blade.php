<div>
    <h4 class="form-header">Learning and Development (L&D) Interventions/Training Programs Attended</h4>
    <form wire:submit.prevent="save">
        @foreach($ldPrograms as $index => $ldProgram)
          <h5>Training Programs Attended #{{ $index + 1 }}</h5>
            <div class="ld-program-item mb-4 border rounded p-3">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="programTitle_{{ $index }}" class="form-label">Title of Learning and Development Interventions/Training Programs (Write in full)</label>
                        <input type="text" class="form-control" id="programTitle_{{ $index }}" wire:model="ldPrograms.{{ $index }}.programTitle">
                        @error('ldPrograms.' . $index . '.programTitle') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="fromDate_{{ $index }}" class="form-label">From (mm/dd/yyyy)</label>
                        <input type="date" class="form-control" id="fromDate_{{ $index }}" wire:model="ldPrograms.{{ $index }}.fromDate">
                        @error('ldPrograms.' . $index . '.fromDate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="toDate_{{ $index }}" class="form-label">To (mm/dd/yyyy)</label>
                        <input type="date" class="form-control" id="toDate_{{ $index }}" wire:model="ldPrograms.{{ $index }}.toDate">
                        @error('ldPrograms.' . $index . '.toDate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="hours_{{ $index }}" class="form-label">Number of Hours</label>
                        <input type="number" class="form-control" id="hours_{{ $index }}" wire:model="ldPrograms.{{ $index }}.hours">
                        @error('ldPrograms.' . $index . '.hours') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="typeOfLD_{{ $index }}" class="form-label">Type of LD (Managerial/Supervisory/Technical/etc.)</label>
                        <input type="text" class="form-control" id="typeOfLD_{{ $index }}" wire:model="ldPrograms.{{ $index }}.typeOfLD">
                        @error('ldPrograms.' . $index . '.typeOfLD') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="conductedBy_{{ $index }}" class="form-label">Conducted/Sponsored By (Write in full)</label>
                        <input type="text" class="form-control" id="conductedBy_{{ $index }}" wire:model="ldPrograms.{{ $index }}.conductedBy">
                        @error('ldPrograms.' . $index . '.conductedBy') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                @if($index > 0)
                    <button type="button" wire:click="removeLdProgram({{ $index }})" class="btn btn-danger btn-sm">Delete Entry</button>
                @endif
            </div>
        @endforeach

        <div class="d-grid">
            <button type="button" wire:click="addLdProgram" class="btn btn-success mt-3">Add Learning & Development Program</button>
        </div>
        <div class="mt-4 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Save and Edit Later</button>
            <button type="submit" class="btn btn-primary">Save Learning & Development Programs</button>
        </div>
    </form>
</div>
