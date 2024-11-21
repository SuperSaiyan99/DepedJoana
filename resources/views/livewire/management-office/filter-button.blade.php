<div class="col-12">
    <!-- Add Button -->

    <!-- Filter and Sort by section -->
    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-search m-2"></i>
            <label for="filter-vacancies" class="m-2">Vacancies: </label>
            <select wire:model="vacancyId" wire:change="updateFilterVacancies" id="filter-vacancies" class="form-select form-select-sm" style="width: auto;">
                @forelse($FilterVacancies as $FilterVacancy)
                    <option value="{{ $FilterVacancy->id }}">{{ $FilterVacancy->position_title }} - {{ $FilterVacancy->school_level }}</option>
                @empty
                    <option disabled selected>No Vacancies Available</option>
                @endforelse
            </select>
        </div>

        <!-- Sort by section -->
        <div class="d-flex align-items-center">
            <label for="sort" class="me-2">Sort by</label>
            <select wire:model="sortType" wire:change="updateSort" id="sort" class="form-select form-select-sm" style="width: auto;">
                <option selected disabled>Select Sort</option>
                <option value="teaching">Teaching</option>
                <option value="non-teaching">Non-Teaching</option>
            </select>
        </div>
    </div>
</div>
