<div>
    <form wire:submit.prevent="save" enctype="multipart/form-data">

        <div class="form-header form-header mt-4">Applicant Information</div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" wire:model="personalInformation.surname">
            </div>
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" wire:model="personalInformation.first_name">
            </div>
            <div class="col-md-6">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" wire:model="personalInformation.middle_name">
            </div>
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">Date of Birth (yyyy-mm-dd)</label>
                <input type="date" class="form-control" id="date_of_birth"
                       wire:model="personalInformation.date_of_birth">
            </div>
            <div class="col-md-6">
                <label for="name_extension" class="form-label">Name Extension</label>
                <select class="form-select" id="name_extension" wire:model="personalInformation.name_extension">
                    <option value="">Select</option>
                    <option value="Jr">Jr</option>
                    <option value="Sr">Sr</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="place_of_birth" class="form-label">Place of Birth</label>
                <input type="text" class="form-control" id="place_of_birth"
                       wire:model="personalInformation.place_of_birth">
            </div>
            <div class="col-md-6">
                <label for="sex" class="form-label">Sex</label>
                <select class="form-select" id="sex" wire:model="personalInformation.sex">
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="civil_status" class="form-label">Civil Status</label>
                <select class="form-select" id="civil_status" wire:model="personalInformation.civil_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="citizenship" class="form-label">Citizenship</label>
                <select type="text" class="form-control" id="citizenship" wire:model="personalInformation.citizenship">
                    <option disabled>Choose Citizenship Type</option>
                    <option value="Filipino">Filipino</option>
                    <option value="Dual Citizenship">Dual Citizenship</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="citizenship_type" class="form-label">Citizenship Type</label>
                <select type="text" class="form-control" id="citizenship_type"
                        wire:model="personalInformation.citizenship_type">
                    <option disabled>Choose Citizenship Type</option>
                    <option value="By Birth">By Birth</option>
                    <option value="By Naturalization">By Naturalization</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="country_if_dual_citizenship" class="form-label">Country If Dual Citizenship</label>
                <select type="text" class="form-control" id="country_if_dual_citizenship"
                        wire:model="personalInformation.country_if_dual_citizenship">
                    <option disabled>Choose Country</option>
                    <option value="by_birth">Philippines</option>
                    <option value="by_naturalization">USA</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="height" class="form-label">Height (m)</label>
                <input type="number" class="form-control" id="height" wire:model="personalInformation.height">
            </div>
            <div class="col-md-6">
                <label for="weight" class="form-label">Weight (kg)</label>
                <input type="number" class="form-control" id="weight" wire:model="personalInformation.weight">
            </div>
            <div class="col-md-6">
                <label for="blood_type" class="form-label">Blood Type</label>
                <input type="text" class="form-control" id="blood_type" wire:model="personalInformation.blood_type">
            </div>
            <div class="col-md-6">
                <label for="Religion" class="form-label">Religion</label>
                <select class="form-select" id="Religion" wire:model="personalInformation.religion">
                    <option value="">Select Municipality</option>
                    <option value="catholic">Catholic</option>
                    <option value="muslim">Muslim</option>
                    <option value="inc">Iglesia Ni Cristo</option>
                    <!-- TODO: Options for Municipality here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="ethnicity" class="form-label">Religion</label>
                <select class="form-select" id="ethnicity" wire:model="personalInformation.ethnicity">
                    <option value="">Select Ethnicity</option>
                    <optgroup label="Indigenous Peoples">
                        <option value="Igorot">Igorot</option>
                        <option value="Lumad">Lumad</option>
                        <option value="Mangyan">Mangyan</option>
                        <option value="Aeta">Aeta</option>
                        <option value="Badjao">Badjao</option>
                    </optgroup>
                    <optgroup label="Lowland Christianized Groups">
                        <option value="Tagalog">Tagalog</option>
                        <option value="Cebuano">Cebuano</option>
                        <option value="Ilocano">Ilocano</option>
                        <option value="Hiligaynon">Hiligaynon</option>
                        <option value="Bicolano">Bicolano</option>
                        <option value="Waray">Waray</option>
                        <option value="Kapampangan">Kapampangan</option>
                        <option value="Pangasinense">Pangasinense</option>
                    </optgroup>
                    <optgroup label="Moro">
                        <option value="Tausug">Tausug</option>
                        <option value="Maranao">Maranao</option>
                        <option value="Maguindanao">Maguindanao</option>
                    </optgroup>
                    <optgroup label="Other Groups">
                        <option value="Chinese Filipino">Chinese Filipino</option>
                        <option value="Spanish Filipino">Spanish Filipino</option>
                        <option value="Filipino Mestizo">Filipino Mestizo</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-6">
                <label for="is_solo_parent" class="form-label">Are you a solo parent?</label>
                <select class="form-select" id="is_solo_parent" wire:model="personalInformation.is_solo_parent">
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

      <div class="form-header form-header mt-5">Applicant Residential Address</div>


            <div class="col-md-6">
                <label for="house_number" class="form-label">House/Block/Lot No.</label>
                <input type="text" class="form-control" id="house_number" wire:model="residential_address.house_number">
            </div>
            <div class="col-md-6">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" wire:model="residential_address.street">
            </div>
            <div class="col-md-6">
                <label for="village" class="form-label">Village</label>
                <input type="text" class="form-control" id="village" wire:model="residential_address.village">
            </div>
            <div class="col-md-6">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" class="form-control" id="barangay" wire:model="residential_address.barangay">
            </div>
            <div class="col-md-6">
                <label for="City" class="form-label">City/Municipality</label>
                <select class="form-select" id="City" wire:model="residential_address.city">
                    <option value="">Select Municipality</option>
                    <option value="digos">Digos</option>
                    <!-- TODO: Options for Municipality here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province" wire:model="residential_address.province">
                    <option value="">Select Province</option>
                    <option value="davao del sur">Daval Del Sur</option>
                    <!-- TODO: Options for provinces here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="zipcode_code" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zipcode_code" wire:model="residential_address.zipcode_code">
            </div>

      <div class="form-header form-header mt-5">Applicant Permanent Address</div>


            <div class="col-md-6">
                <label for="house_number" class="form-label">House/Block/Lot No.</label>
                <input type="text" class="form-control" id="house_number" wire:model="permanent_address.house_number">
            </div>
            <div class="col-md-6">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" wire:model="permanent_address.street">
            </div>
            <div class="col-md-6">
                <label for="village" class="form-label">Village</label>
                <input type="text" class="form-control" id="village" wire:model="permanent_address.village">
            </div>
            <div class="col-md-6">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" class="form-control" id="barangay" wire:model="permanent_address.barangay">
            </div>
            <div class="col-md-6">
                <label for="City" class="form-label">City/Municipality</label>
                <select class="form-select" id="City" wire:model="permanent_address.city">
                    <option value="">Select Municipality</option>
                    <option value="digos">Digos</option>
                    <!-- TODO: Options for Municipality here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="province" class="form-label">Province</label>
                <select class="form-select" id="province" wire:model="permanent_address.province">
                    <option value="">Select Province</option>
                    <option value="davao del sur">Daval Del Sur</option>
                    <!-- TODO: Options for provinces here -->
                </select>
            </div>
            <div class="col-md-6">
                <label for="zipcode_code" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zipcode_code" wire:model="permanent_address.zipcode_code">
            </div>


      <div class="form-header form-header mt-5">Contact Information</div>


            <div class="col-md-6">
                <label for="telephone_no" class="form-label">Telephone No.</label>
                <input type="text" class="form-control" id="telephone_no" wire:model="contact_information.telephone_no">
            </div>
            <div class="col-md-6">
                <label for="mobile_no" class="form-label">Mobile No.</label>
                <input type="text" class="form-control" id="mobile_no" wire:model="contact_information.mobile_no">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail address</label>
                <input type="email" class="form-control" id="email" wire:model="contact_information.email_address">
            </div>

      <div class="form-header form-header mt-5">Applicant ID</div>

            <div class="col-md-6">
                <label for="gsis_id_no" class="form-label">GSIS ID No.</label>
                <input type="text" class="form-control" id="gsis_id_no" wire:model="personalInformation.gsis_id_no">
            </div>
            <div class="col-md-6">
                <label for="pag_ibig_id_no" class="form-label">PAG-IBIG ID No.</label>
                <input type="text" class="form-control" id="pag_ibig_id_no"
                       wire:model="personalInformation.pag_ibig_id_no">
            </div>
            <div class="col-md-6">
                <label for="philhealth_no" class="form-label">PhilHealth No.</label>
                <input type="text" class="form-control" id="philhealth_no"
                       wire:model="personalInformation.philhealth_no">
            </div>
            <div class="col-md-6">
                <label for="sss_no" class="form-label">SSS No.</label>
                <input type="text" class="form-control" id="sss_no" wire:model="personalInformation.sss_no">
            </div>
            <div class="col-md-6">
                <label for="agency_employee_no" class="form-label">Agency Employee No.</label>
                <input type="text" class="form-control" id="agency_employee_no"
                       wire:model="personalInformation.agency_employee_no">
            </div>
            <div class="col-md-6">
                <label for="tin_no" class="form-label">TIN</label>
                <input type="text" class="form-control" id="tin_no" wire:model="personalInformation.tin_no">
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-secondary">Save and Edit Later</button>
        </div>
    </form>
</div>
