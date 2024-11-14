<div>
    <!--[navigation tabs]-->
    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
        @foreach ($workExperiences as $index => $workExperience)
            <li class="nav-item">
                <a class="nav-link @if($loop->first) active @endif" id="line-home-tab-{{ $index }}" data-bs-toggle="pill"
                   href="#line-home-{{ $index }}" role="tab" aria-controls="pills-home" aria-selected="true">
                    Work Experience #{{ $index + 1 }}
                </a>
            </li>
        @endforeach
    </ul>

    <!--[contents of tab]-->
    <div class="tab-content mt-3 mb-3" id="line-tabContent">
        <div class="mb-3">
            <button class="btn btn-primary btn-sm" wire:click.prevent="addWorkExperience">
                <i class="fa fa-plus"></i> Add Work Experience
            </button>
        </div>
        @foreach ($workExperiences as $index => $workExperience)
            <div class="tab-pane fade @if($loop->first) show active @endif" id="line-home-{{ $index }}" role="tabpanel"
                 aria-labelledby="line-home-tab-{{ $index }}">

                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Duration</label>
                        <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                             data-date-autoclose="true">
                            <input type="date" class="form-control" name="start" placeholder="Start Date"
                                   wire:model="workExperiences.{{ $index }}.start">
                            <input type="date" class="form-control" name="end" placeholder="End Date"
                                   wire:model="workExperiences.{{ $index }}.end">
                        </div>
                        @error('workExperiences.' . $index . '.start') <span class="text-danger">{{ $message }}</span> @enderror
                        @error('workExperiences.' . $index . '.end') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="position" class="form-label fw-bold">Position</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter position title"
                               wire:model="workExperiences.{{ $index }}.position">
                        @error('workExperiences.' . $index . '.position') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="officeUnit" class="form-label fw-bold">Name of Office/Unit</label>
                        <input type="text" class="form-control" id="officeUnit" name="officeUnit"
                               placeholder="Enter office or unit name" wire:model="workExperiences.{{ $index }}.officeUnit">
                        @error('workExperiences.' . $index . '.officeUnit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="supervisor" class="form-label fw-bold">Immediate Supervisor</label>
                        <input type="text" class="form-control" id="supervisor" name="supervisor"
                               placeholder="Enter supervisor name" wire:model="workExperiences.{{ $index }}.supervisor">
                        @error('workExperiences.' . $index . '.supervisor') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="agency" class="form-label fw-bold">Name of Agency/Organization and Location</label>
                        <input type="text" class="form-control" id="agency" name="agency"
                               placeholder="Enter agency or organization name" wire:model="workExperiences.{{ $index }}.agency">
                        @error('workExperiences.' . $index . '.agency') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="accomplishments" class="form-label fw-bold">List of Accomplishments and Contributions (if any)</label>
                        <textarea class="form-control" id="accomplishments" name="accomplishments" rows="3"
                                  placeholder="Enter accomplishments" wire:model="workExperiences.{{ $index }}.accomplishments"></textarea>
                        @error('workExperiences.' . $index . '.accomplishments') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="duties" class="form-label fw-bold">Summary of Actual Duties</label>
                        <div wire:ignore>
                            <div wire:model="workExperiences.{{ $index }}.duties"
                                 class="min-h-fit h-48 "
                                 name="duties"
                                 id="editor">
                            </div>
                        </div>
                        @error('workExperiences.' . $index . '.duties') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>

                @if($index > 0)
                    <button class="btn btn-danger" wire:click.prevent="removeWorkExperience({{ $index }})">Remove This Work Experience</button>
                @endif

            </div>
        @endforeach
    </div>

    <div class="d-grid mt-4">
        <button type="button" class="btn btn-success" wire:click.prevent="save">Save All Work Experiences</button>
    </div>
</div>


@script
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>

<script type="module">
    import {Autoformat, Bold, ClassicEditor, Essentials, Font, Italic, Paragraph} from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph, Autoformat],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'numberedList', 'bulletedList' // No need for the extra `items` property here
            ]
        } )
</script>
@endscript
