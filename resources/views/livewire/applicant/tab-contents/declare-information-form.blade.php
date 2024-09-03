<div>
    <h4 class="form-header">Declaration</h4>
    <form wire:submit.prevent="submit">
        <!-- First Row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="govIssuedID" class="form-label">Government Issued ID</label>
                <input type="text" class="form-control" id="govIssuedID" wire:model="govIssuedID" placeholder="e.g., Passport, GSIS, SSS, PRC, Driver's License">
                @error('govIssuedID') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="idNumber" class="form-label">ID/License/Passport No.</label>
                <input type="text" class="form-control" id="idNumber" wire:model="idNumber" placeholder="Please indicate ID Number">
                @error('idNumber') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Second Row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="dateAccomplished" class="form-label">Date Accomplished</label>
                <input type="date" class="form-control" id="dateAccomplished" wire:model="dateAccomplished">
                @error('dateAccomplished') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-md-6">
                <label for="datePlaceIssued" class="form-label">Date/Place of Issuance</label>
                <input type="text" class="form-control" id="datePlaceIssued" wire:model="datePlaceIssued" placeholder="Enter Date and Place of Issuance">
                @error('datePlaceIssued') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Third Row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="photoUpload" class="form-label">ID Picture (4.5 cm x 3.5 cm)</label>
                <input type="file" class="form-control" id="photoUpload" wire:model="photoUpload">
                @error('photoUpload') <span class="text-danger">{{ $message }}</span> @enderror
                <span class="note text-danger"><i>ID picture taken within the last 6 months. Computer-generated or photocopied picture is not acceptable.</i></span>
            </div>

            <div class="col-md-6">
                <label for="thumbmarkUpload" class="form-label">Right Thumbmark</label>
                <input type="file" class="form-control" id="thumbmarkUpload" wire:model="thumbmarkUpload">
                @error('thumbmarkUpload') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Fourth Row -->
        <div class="row mb-4">
            <div class="col-md-12">
                <label for="signatureUpload" class="form-label">Signature</label>
                <input type="file" class="form-control" id="signatureUpload" wire:model="signatureUpload">
                @error('signatureUpload') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Checkbox -->
        <div class="checkbox-container mt-4 mb-4">
            <input type="checkbox" id="declareOath" wire:model="declareOath">
            <label for="declareOath">I declare that the information given is true and correct.</label>
            @error('declareOath') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-save">Submit</button>
        </div>
    </form>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
