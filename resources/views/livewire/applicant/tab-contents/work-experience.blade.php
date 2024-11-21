<div>
    <h4 class="form-header">Work Experience</h4>
    <form>
        @foreach($experiences as $index => $experience)
            <h5>Work Experience #{{ $index + 1 }}</h5>
            <div class="experience-item mb-4 border rounded p-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jobTitle_{{ $index }}" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle_{{ $index }}" wire:model="experiences.{{ $index }}.job_titles">
                            @error('experiences.' . $index . '.job_titles') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Government Service</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="govServiceYes_{{ $index }}" wire:model="experiences.{{ $index }}.government_service" value="Yes">
                                <label class="form-check-label" for="govServiceYes_{{ $index }}">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="govServiceNo_{{ $index }}" wire:model="experiences.{{ $index }}.government_service" value="No">
                                <label class="form-check-label" for="govServiceNo_{{ $index }}">No</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="startDate_{{ $index }}" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate_{{ $index }}" wire:model="experiences.{{ $index }}.start_date">
                            @error('experiences.' . $index . '.start_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="company_{{ $index }}" class="form-label">Company</label>
                            <input type="text" class="form-control" id="company_{{ $index }}" wire:model="experiences.{{ $index }}.company">
                            @error('experiences.' . $index . '.company') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="salaryGrade_{{ $index }}" class="form-label">Salary Grade</label>
                                    <select class="form-select" id="salaryGrade_{{ $index }}" wire:model="experiences.{{ $index }}.salary_grade">
                                        <option value="0">None</option>
                                        @foreach ($salaryGrades as $grade)
                                            <option value="{{ $grade->grade_number }}">{{ $grade->grade_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="salaryStep_{{ $index }}" class="form-label">Salary Step</label>
                                    <select class="form-select" id="salaryStep_{{ $index }}" wire:model="experiences.{{ $index }}.salary_step">
                                        <option value="0">None</option>
                                        @foreach (range(1, 8) as $step)
                                            <option value="{{ $step }}">Step {{ $step }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="endDate_{{ $index }}" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate_{{ $index }}" wire:model="experiences.{{ $index }}.end_date">
                            <div class="form-check mt-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="currentRole_{{ $index }}"
                                    wire:model="experiences.{{ $index }}.current_role"
                                >
                                <label class="form-check-label" for="currentRole_{{ $index }}">I am currently in this role</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description_{{ $index }}" class="form-label">Description</label>
                    <textarea
                        id="description_{{ $index }}"
                        wire:model="experiences.{{ $index }}.description"
                        class="form-control"
                        wire:input="updateCharacterCount($event.target.value.length, {{ $index }})"
                    ></textarea>
                    <div class="text-end text-muted mt-1" id="char_count_{{ $index }}">
                        {{ $characterCounts[$index] ?? 0 }} / 2000
                    </div>
                </div>
                @if($index > 0)
                    <button type="button" wire:click="removeExperience({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                @endif
            </div>
        @endforeach
        <div class="d-grid">
            <button type="button" wire:click="addExperience" class="btn btn-success">Add Work Experience</button>
        </div>
        <div class="mt-4 d-flex justify-content-between">
            <button wire:click.prevent="save" class="btn btn-secondary">Save and Edit Later</button>
            <button wire:click.prevent="save" class="btn btn-primary">Save Work Experience Data</button>
        </div>
    </form>
</div>


@script
<script>
    // Add an event listener to each textarea for 'input' events
    document.addEventListener('livewire:init', function () {
        let textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function () {

                let index = textarea.id.split('_')[1];

                @this.dispatch('updateTextareaCount', textarea.value.length, index);
            });
        });
    });
</script>
@endscript
