<div>
    <div class="card-body">
        <h4 class="form-header">Upload Photocopy of Documents</h4>
        <h5 class="card-title-desc text-danger">
            <i class="fa fa-exclamation-circle me-2"></i> Important Reminder!
        </h5>

        <div class="alert alert-warning" role="alert">
            <h6 class="alert-heading"><i class="fa fa-info-circle me-2"></i> Please Note:</h6>
            <ul class="mb-0">
                <li>All uploaded documents must be in PDF format.</li>
                <li>Make sure your documents are clear and legible.</li>
                <li>Ensure that the file size does not exceed 5MB.</li>
                <li>Do not upload scanned images of documents; original digital documents are preferred.</li>
            </ul>
        </div>

        <div class="alert alert-info" role="alert">
            <h6 class="alert-heading"><i class="fa fa-check-circle me-2"></i> What to Upload:</h6>
            <ul class="mb-0">
                <li>Government-issued IDs (e.g., Passport, Driver's License)</li>
                <li>Recent utility bill as proof of address</li>
                <li>Any other required documents specific to your application</li>
            </ul>
        </div>

        <div>

            <form wire:submit.prevent="save" method="post" class="text-center p-4 bg-light border rounded">
                <div class="mb-3">
                    <i class="display-4 text-muted uil uil-cloud-upload"></i>
                </div>
                <h4><i class="fa fa-upload"></i> Upload</h4>
                <div class="mt-2">
                    <input type="file" accept=".pdf" wire:model="photo" class="form-control">
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                </div>

                <!-- Spinner Indicator -->
                <div class="mt-3" wire:loading wire:target="photo">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Uploading...</span>
                        </div>
                        <span class="ms-2">Uploading... {{ $uploadProgress }}%</span>
                    </div>
                </div>

                <div wire:loading.remove wire:target="photo" class="mt-3">
                    @if ($uploadProgress > 0)
                        <div class="alert alert-success">Upload complete!</div>
                    @endif
                </div>


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary mt-2">Upload</button>
                </div>
            </form>



        </div>
    </div>
</div>
