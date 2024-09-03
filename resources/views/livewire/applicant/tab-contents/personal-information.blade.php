<div>
    <h4 class="form-header">Personal Information</h4>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" wire:model="surname">
            </div>
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" wire:model="firstname">
            </div>
            <div class="col-md-6">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" wire:model="middlename">
            </div>
            <div class="col-md-6">
                <label for="dob" class="form-label">Date of Birth (yyyy-mm-dd)</label>
                <input type="date" class="form-control" id="dob" wire:model="dob">
            </div>
            <div class="col-md-6">
                <label for="extension" class="form-label">Name Extension</label>
                <select class="form-select" id="extension" wire:model="extension">
                    <option value="">Select</option>
                    <option value="Jr">Jr</option>
                    <option value="Sr">Sr</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="birthplace" class="form-label">Place of Birth</label>
                <input type="text" class="form-control" id="birthplace" wire:model="birthplace">
            </div>
            <div class="col-md-6">
                <label for="sex" class="form-label">Sex</label>
                <select class="form-select" id="sex" wire:model="sex">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="civilstatus" class="form-label">Civil Status</label>
                <select class="form-select" id="civilstatus" wire:model="civilstatus">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Residential Address No., Street, Brgy.</label>
                <input type="text" class="form-control" id="address" wire:model="address">
            </div>
            <div class="col-md-6">
                <label for="region" class="form-label">Region</label>
                <select class="form-select" id="region" wire:model="region">
                    <option value="">Select Region</option>
                    <!-- Options for regions here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province" wire:model="province">
                    <option value="">Select Province</option>
                    <!-- Options for provinces here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="municipality" class="form-label">City/Municipality</label>
                <select class="form-select" id="municipality" wire:model="municipality">
                    <option value="">Select Municipality</option>
                    <!-- Options for municipalities here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="zip" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zip" wire:model="zip">
            </div>
            <div class="col-md-6">
                <label for="telephone" class="form-label">Telephone No.</label>
                <input type="text" class="form-control" id="telephone" wire:model="telephone">
            </div>
            <div class="col-md-6">
                <label for="cellphone" class="form-label">Cellphone No.</label>
                <input type="text" class="form-control" id="cellphone" wire:model="cellphone">
            </div>
            <div class="col-md-6">
                <label for="citizenship" class="form-label">Citizenship</label>
                <input type="text" class="form-control" id="citizenship" wire:model="citizenship">
            </div>
            <div class="col-md-6">
                <label for="height" class="form-label">Height (m)</label>
                <input type="text" class="form-control" id="height" wire:model="height">
            </div>
            <div class="col-md-6">
                <label for="weight" class="form-label">Weight (kg)</label>
                <input type="text" class="form-control" id="weight" wire:model="weight">
            </div>
            <div class="col-md-6">
                <label for="bloodtype" class="form-label">Blood Type</label>
                <input type="text" class="form-control" id="bloodtype" wire:model="bloodtype">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail address</label>
                <input type="email" class="form-control" id="email" wire:model="email">
            </div>
            <div class="col-md-6">
                <label for="religion" class="form-label">Religion</label>
                <input type="text" class="form-control" id="religion" wire:model="religion">
            </div>
            <div class="col-md-6">
                <label for="gsis" class="form-label">GSIS ID No.</label>
                <input type="text" class="form-control" id="gsis" wire:model="gsis">
            </div>
            <div class="col-md-6">
                <label for="pagibig" class="form-label">PAG-IBIG ID No.</label>
                <input type="text" class="form-control" id="pagibig" wire:model="pagibig">
            </div>
            <div class="col-md-6">
                <label for="philhealth" class="form-label">PhilHealth No.</label>
                <input type="text" class="form-control" id="philhealth" wire:model="philhealth">
            </div>
            <div class="col-md-6">
                <label for="sss" class="form-label">SSS No.</label>
                <input type="text" class="form-control" id="sss" wire:model="sss">
            </div>
            <div class="col-md-6">
                <label for="employee" class="form-label">Agency Employee No.</label>
                <input type="text" class="form-control" id="employee" wire:model="employee">
            </div>
            <div class="col-md-6">
                <label for="tin" class="form-label">TIN</label>
                <input type="text" class="form-control" id="tin" wire:model="tin">
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Save and Edit Later</button>
            <button type="submit" class="btn btn-save">Save Personal Data</button>
        </div>
    </form>
</div>
