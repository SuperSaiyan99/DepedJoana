<div class="card-body">

    <h4 class="card-title">Upload Your Documents</h4>
    <p class="card-title-desc">DropzoneJS is an open source library
        that provides drag’n’drop file uploads with image previews.
    </p>

    <div>
        <form wire:submit="save" class="dropzone dz-clickable" id="dropzone-id">
            <div class="dz-message needsclick">
                <div class="mb-3">
                    <i class="display-4 text-muted uil uil-cloud-upload"></i>
                </div>
                <h4>Click Here</h4>
                <span>
                    <input type="file" accept=".pdf" wire:model="photos" id="file-upload">
                </span>
            </div>
            @error('photos.*') <span class="error">{{ $message }}</span> @enderror
        </form>
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary waves-effect waves-light">Send Files</button>
    </div>
</div>
