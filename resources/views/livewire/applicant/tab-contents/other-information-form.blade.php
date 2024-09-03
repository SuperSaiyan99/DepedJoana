<div>
    <h4 class="form-header">Other Information</h4>
    <form wire:submit.prevent="save">
        <!-- Skills Section -->
        @foreach($skills as $index => $skill)
            <div class="row m-3 align-items-end border rounded p-3">
                <h5>Skills/Hobbies #{{ $index + 1 }}</h5>
                <div class="col-md-5">
                    <label for="skill_{{ $index }}" class="form-label">Special Skills and Hobbies</label>
                    <input type="text" class="form-control" placeholder="Enter information here" id="skill_{{ $index }}" wire:model="skills.{{ $index }}">
                </div>

                @if($index > 0)
                    <div class="col-md-2 mt-2">
                        <button type="button" wire:click="removeSkills({{ $index }})" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                @endif

            </div>
        @endforeach

        <div class="col-md-5 m-3">
            <button type="button" wire:click="addSkills" class="btn btn-success mb-4">Add Skill/Hobbies</button>
        </div>

        <!-- Recognition Section -->
        @foreach($recognition as $index => $recognize)
            <div class="row m-3 align-items-end border rounded p-3">
                <h5>Recognition #{{ $index + 1 }}</h5>
                <div class="col-md-5">
                    <label for="recognition_{{ $index }}" class="form-label">Non-Academic Distinctions/Recognition</label>
                    <input type="text" class="form-control" placeholder="Enter information here" id="recognition_{{ $index }}" wire:model="recognition.{{ $index }}">
                </div>

                @if($index > 0)
                    <div class="col-md-2 mt-2">
                        <button type="button" wire:click="removeRecognition({{ $index }})" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                @endif

            </div>
        @endforeach
        <div class="col-md-5 m-3">
            <button type="button" wire:click="addRecognition" class="btn btn-success mb-4">Add Recognition</button>
        </div>

        <!-- Membership Section -->
        @foreach($membership as $index => $member)
            <div class="row m-3 align-items-end border rounded p-3">
                <h5>Membership #{{ $index + 1 }}</h5>
                <div class="col-md-5">
                    <label for="membership_{{ $index }}" class="form-label">Membership in Association/Organization</label>
                    <input type="text" class="form-control" placeholder="Enter information here" id="membership_{{ $index }}" wire:model="membership.{{ $index }}">
                </div>

                @if($index > 0)
                    <div class="col-md-2 mt-2">
                        <button type="button" wire:click="removeMembership({{ $index }})" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                @endif

            </div>
        @endforeach
        <div class="col-md-5 m-3">
            <button type="button" wire:click="addMembership" class="btn btn-success mb-4">Add Membership</button>
        </div>

        <div class="mt-4 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Save and Edit Later</button>
            <button type="submit" class="btn btn-primary">Save Other Information</button>
        </div>
    </form>
</div>
