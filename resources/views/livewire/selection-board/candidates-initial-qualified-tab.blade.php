<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
    <table class="table table-hover table-borderless">
        <thead>
        <tr>
            <th>Applicant Code</th>
            <th>Applying For</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <tr wire:loading>
            <td colspan="3" class="text-center">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </td>
        </tr>
            @forelse($candidates as $candidate)
                <tr wire:loading.remove>
                    <td>
                        <span class="avatar"><i class="fas fa-user"></i></span>
                        <a href="#">{{ $candidate->applicant_code }}</a>
                    </td>
                    <td>{{ ucwords($candidate->position_title) }} - {{ ucwords($candidate->school_level) }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $candidate->status)) }}</td>
                </tr>
            @empty
                <tr colspan="3" wire:loading.remove>
                    <td>No candidates found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

