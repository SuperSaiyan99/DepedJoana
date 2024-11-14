<form wire:submit.prevent="save">
    <div class="row g-3">
        <div class="form-header">
            Spouse's Information
        </div>
        <div class="col-md-6">
            <label for="spouseSurname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="spouseSurname" wire:model="spouseSurname">
        </div>
        <div class="col-md-6">
            <label for="spouseFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="spouseFirstName" wire:model="spouseFirstName">
        </div>
        <div class="col-md-6">
            <label for="spouseMiddleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="spouseMiddleName" wire:model="spouseMiddleName">
        </div>
        <div class="col-md-6">
            <label for="spouseExtension" class="form-label">Name Extension</label>
            <select class="form-select" id="spouseExtension" wire:model="spouseExtension">
                <option selected>Select</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" id="occupation" wire:model="occupation">
        </div>
        <div class="col-md-6">
            <label for="businessName" class="form-label">Employer/Business Name</label>
            <input type="text" class="form-control" id="businessName" wire:model="businessName">
        </div>
        <div class="col-md-6">
            <label for="businessAddress" class="form-label">Business Address</label>
            <input type="text" class="form-control" id="businessAddress" wire:model="businessAddress">
        </div>
        <div class="col-md-6">
            <label for="telephone" class="form-label">Telephone No.</label>
            <input type="text" class="form-control" id="telephone" wire:model="telephone">
        </div>
    </div>

    <div class="form-header mt-5">
        Father's Information
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <label for="fatherSurname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="fatherSurname" wire:model="fatherSurname">
        </div>
        <div class="col-md-6">
            <label for="fatherFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fatherFirstName" wire:model="fatherFirstName">
        </div>
        <div class="col-md-6">
            <label for="fatherMiddleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="fatherMiddleName" wire:model="fatherMiddleName">
        </div>
        <div class="col-md-6">
            <label for="fatherExtension" class="form-label">Name Extension</label>
            <select class="form-select" id="fatherExtension" wire:model="fatherExtension">
                <option selected>Select</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
            </select>
        </div>
        <div class="form-header mt-5">
            Mother's Information
        </div>
        <div class="col-md-6">
            <label for="motherMaidenSurname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="motherMaidenSurname" wire:model="motherMaidenSurname">
        </div>
        <div class="col-md-6">
            <label for="motherFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="motherFirstName" wire:model="motherFirstName">
        </div>
        <div class="col-md-6">
            <label for="motherMiddleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="motherMiddleName" wire:model="motherMiddleName">
        </div>
    </div>

    <div class="form-header mt-5">
        Children's Information
    </div>
    @foreach($children as $index => $child)
        <div class="row g-3" wire:key="child-{{ $index }}">
            <div class="col-md-4">
                <label for="children_name_{{ $index }}" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="children_name_{{ $index }}"
                       wire:model="children.{{ $index }}.children_name">
            </div>
            <div class="col-md-4">
                <label for="children_dob_{{ $index }}" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="children_dob_{{ $index }}"
                       wire:model="children.{{ $index }}.children_dob">
            </div>

            @if( $index > 0)
                <div class="col-md-4 justify-content-end mt-5">
                    <button type="button" class="btn btn-danger" wire:click.prevent="removeChildren({{ $index }})">
                        Delete
                    </button>
                </div>
            @endif

        </div>
    @endforeach

    <div class="d-flex justify-content-start mt-3">
        <button type="button" class="btn btn-success" wire:click.prevent="addChildren">Add Child</button>
    </div>

    <div class="mt-4 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary">Save and Edit Later</button>
        <button type="submit" class="btn btn-primary">Save Family Data</button>
    </div>
</form>
