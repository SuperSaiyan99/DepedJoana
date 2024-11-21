<div>
    <h4 class="mb-4 mt-4">Educational Background</h4>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Level</th>
                <th scope="col">Name of School <br>(Write in full)</th>
                <th scope="col">Basic Education/Degree/Course <br>(Write in full)</th>
                <th scope="col" colspan="2">Period of Attendance</th>
                <th scope="col">Highest level/ Units Earned <br>(If not graduated)</th>
                <th scope="col">Year Graduated</th>
                <th scope="col">Scholarship/Academic Honors Received</th>
            </tr>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach(['elementary', 'secondary', 'vocational', 'college', 'graduate'] as $level)
                <tr>
                    <td>{{ ucfirst($level) }}</td>
                    <td><input type="text" class="table-input" wire:model="education.{{ $level }}.school"></td>
                    <td><input type="text" class="table-input" wire:model="education.{{ $level }}.course"></td>
                    <td><input type="number" class="table-input" wire:model="education.{{ $level }}.from"></td>
                    <td><input type="number" class="table-input" wire:model="education.{{ $level }}.to"></td>
                    <td><input type="text" class="table-input" wire:model="education.{{ $level }}.units"></td>
                    <td><input type="text" class="table-input" wire:model="education.{{ $level }}.graduated"></td>
                    <td><input type="text" class="table-input" wire:model="education.{{ $level }}.honors"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" wire:click.prevent="save">Save and Edit Later</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="save">Save Education Data</button>
    </div>
</div>
