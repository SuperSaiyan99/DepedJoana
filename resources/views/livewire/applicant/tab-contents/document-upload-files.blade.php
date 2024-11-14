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
