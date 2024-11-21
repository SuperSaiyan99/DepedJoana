<div>
    <h4 class="form-header">References</h4>
    <p class="form-note text-danger"><i>Person not related by consanguinity or affinity to applicant/appointee</i></p>
    <form>
        @foreach($this->references as $index => $reference)
            <h5>Reference #{{ $index + 1  }}</h5>
            <div class="repeater-item mb-3 border round p-3">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name-{{ $index }}" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name-{{ $index }}"
                               wire:model="references.{{ $index }}.name">
                        @error("references.{$index}.name") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="address-{{ $index }}" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address-{{ $index }}"
                               wire:model="references.{{ $index }}.address">
                        @error("references.{$index}.address") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="telNo-{{ $index }}" class="form-label">Tel. No.</label>
                        <input type="text" class="form-control" id="telNo-{{ $index }}"
                               wire:model="references.{{ $index }}.telNo">
                        @error("references.{$index}.telNo") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                @if( 0 < $index)
                    <button type="button" class="btn btn-danger mt-3" wire:click="removeReference({{ $index }})">Delete
                        Entry
                    </button>
                @endif

            </div>
        @endforeach
        <div class="d-grid">
            <button type="button" class="btn btn-success" wire:click="addReference">Add Reference</button>
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <button wire:click.prevent="submit" class="btn btn-secondary">Save and Edit Later</button>
        </div>
    </form>
</div>
