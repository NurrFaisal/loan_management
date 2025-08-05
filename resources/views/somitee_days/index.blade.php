@section('title', 'Somitee Days | MicroFinance Pro')
@extends('layouts.layout')

@section('content')
<div class="row g-4">
    <!-- Page Header -->
    <div class="col-12">
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-1">
                            <i class="fas fa-calendar-week text-primary me-2"></i>
                            Somitee Days Management
                        </h1>
                        <p class="text-muted mb-0">Manage weekly collection days for committees</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('somitee_days.create') }}" class="modern-btn modern-btn-primary">
                            <i class="fas fa-plus"></i>
                            Add New Day
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Days Table -->
    <div class="col-12">
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Collection Days</h5>
                    <div class="d-flex gap-2">
                        <div class="input-group" style="width: 250px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="searchDays" class="form-control border-start-0" placeholder="Search days...">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modern-table">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Weekday</th>
                            <th>Collection Time</th>
                            <th>Status</th>
                            <th>Somitees Count</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($somiteeDays as $day)
                            <tr>
                                <td><strong>#{{ $day->id }}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                            <span class="text-primary fw-bold">{{ substr($day->weekday, 0, 1) }}</span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">{{ $day->weekday }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($day->collection_time)
                                        <span class="modern-badge bg-info text-white">
                                            {{ \Carbon\Carbon::parse($day->collection_time)->format('h:i A') }}
                                        </span>
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </td>
                                <td>
                                    @if($day->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-primary">{{ $day->somitees_count }}</span>
                                    <small class="text-muted">committees</small>
                                </td>
                                <td>
                                    <div style="max-width: 200px;">
                                        {{ Str::limit($day->description ?? 'No description', 50) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('somitee_days.show', $day->id) }}" class="btn btn-outline-primary" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('somitee_days.edit', $day->id) }}" class="btn btn-outline-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" title="Delete" 
                                                onclick="confirmDelete({{ $day->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <form id="delete-form-{{ $day->id }}" action="{{ route('somitee_days.destroy', $day->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-calendar-times fa-3x mb-3 d-block"></i>
                                        <h5>No collection days found</h5>
                                        <p>Start by creating your first collection day.</p>
                                        <a href="{{ route('somitee_days.create') }}" class="modern-btn modern-btn-primary">
                                            <i class="fas fa-plus"></i>
                                            Create Day
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
// Search functionality
document.getElementById('searchDays').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('tbody tr');
    
    tableRows.forEach(row => {
        const cells = row.querySelectorAll('td');
        let found = false;
        
        cells.forEach(cell => {
            if (cell.textContent.toLowerCase().includes(searchValue)) {
                found = true;
            }
        });
        
        row.style.display = found ? '' : 'none';
    });
});

// Delete confirmation
function confirmDelete(dayId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this day deletion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + dayId).submit();
        }
    });
}
</script>
@endsection