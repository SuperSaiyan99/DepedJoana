<div>
    <!-- Search Input -->
    <label for="searchTerm">Search Board Member:</label>
    <input type="text" wire:model.live="searchTerm" name="searchTerm"  placeholder="Search Board Member..." class="form-control" />


    @if(!empty($searchTerm))
        <ul class="list-group mt-2">
            @forelse($searchResults as $result)
                <li class="list-group-item">
                    {{ ucwords($result->name) }}
                    <button wire:click="selectMember({{ $result->id }})" class="btn btn-primary btn-sm">Select</button>
                </li>
            @empty
                <li class="list-group-item">No results found.</li>
            @endforelse
        </ul>
    @endif


    <!-- Selected Members Table -->
    <div class="table-responsive mt-4">
        <table class="table table-hover table-borderless">
            <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Assign</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @forelse($selectedMembers as $index => $member)
                <tr>
                    <td>
                        <span class="avatar"><i class="fas fa-user"></i></span>
                        <a href="#">{{ ucwords($member['name']) }}</a> <!-- Corrected name access -->
                    </td>
                    <td>
                        <select wire:model="selectedRoles.{{ $index }}" class="form-control">
                            <option value="chairperson" {{ isset($member['role_in_board']) === 'chairperson' ? 'selected' : '' }}>Chairperson</option>
                            <option value="member" {{ isset($member['role_in_board']) === 'member' ? 'selected' : '' }}>Member</option>
                            <option value="sub_committee" {{ isset($member['role_in_board']) === 'sub_committee' ? 'selected' : '' }}>Sub Committee</option>
                        </select>
                    </td>
                    <td>{{ ucwords($member['assigned_position']) }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="removeMember({{ $index }})">Remove</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Selection Board Assigned.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
