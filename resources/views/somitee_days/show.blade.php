@section('title', 'Somitee Day Details | MicroFinance Pro')
@extends('layouts.layout')

@section('content')
<div class="row g-4">
    <!-- Page Header -->
    <div class="col-12">
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="d-flex align-items-center">
                    <a href="{{ route('somitee_days.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div class="flex-grow-1">
                        <h1 class="h3 mb-1">
                            <i class="fas fa-calendar-day text-primary me-2"></i>
                            {{ $somiteeDay->weekday }} Collection Day
                        </h1>
                        <p class="text-muted mb-0">Collection day details and associated committees</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('somitee_days.edit', $somiteeDay->id) }}" class="modern-btn modern-btn-warning">
                            <i class="fas fa-edit"></i>
                            Edit Day
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Day Details -->
    <div class="col-lg-8">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle text-primary me-2"></i>
                    Day Information
                </h5>
            </div>
            <div class="modern-card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="fw-medium text-muted">Weekday</label>
                            <div class="d-flex align-items-center mt-1">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <span class="text-primary fw-bold">{{ substr($somiteeDay->weekday, 0, 1) }}</span>
                                </div>
                                <h5 class="mb-0">{{ $somiteeDay->weekday }}</h5>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="fw-medium text-muted">Collection Time</label>
                            <div class="mt-1">
                                @if($somiteeDay->collection_time)
                                    <span class="modern-badge bg-info text-white fs-6">
                                        <i class="fas fa-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($somiteeDay->collection_time)->format('h:i A') }}
                                    </span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="fw-medium text-muted">Status</label>
                            <div class="mt-1">
                                @if($somiteeDay->is_active)
                                    <span class="badge bg-success fs-6">
                                        <i class="fas fa-check-circle me-1"></i>Active
                                    </span>
                                @else
                                    <span class="badge bg-danger fs-6">
                                        <i class="fas fa-times-circle me-1"></i>Inactive
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="info-item">
                            <label class="fw-medium text-muted">Created Date</label>
                            <div class="mt-1">
                                <span class="text-dark">{{ $somiteeDay->created_at->format('M d, Y') }}</span>
                                <small class="text-muted">at {{ $somiteeDay->created_at->format('h:i A') }}</small>
                            </div>
                        </div>
                    </div>
                    
                    @if($somiteeDay->description)
                    <div class="col-12">
                        <div class="info-item">
                            <label class="fw-medium text-muted">Description</label>
                            <div class="mt-2 p-3 bg-light rounded">
                                {{ $somiteeDay->description }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics -->
    <div class="col-lg-4">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-bar text-primary me-2"></i>
                    Statistics
                </h5>
            </div>
            <div class="modern-card-body">
                <div class="text-center">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-users text-primary fs-4"></i>
                    </div>
                    <h3 class="mb-1">{{ $somiteeDay->somitees->count() }}</h3>
                    <p class="text-muted mb-0">Associated Committees</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Associated Somitees -->
    @if($somiteeDay->somitees->count() > 0)
    <div class="col-12">
        <div class="modern-card">
            <div class="modern-card-header">
                <h5 class="mb-0">
                    <i class="fas fa-users text-primary me-2"></i>
                    Associated Committees ({{ $somiteeDay->somitees->count() }})
                </h5>
            </div>
            <div class="modern-table">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Committee Name</th>
                            <th>Employee</th>
                            <th>Branch</th>
                            <th>Members</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($somiteeDay->somitees as $somitee)
                            <tr>
                                <td>
                                    <div class="fw-medium">{{ $somitee->name }}</div>
                                    <small class="text-muted">ID: #{{ $somitee->id }}</small>
                                </td>
                                <td>{{ $somitee->employee->name ?? 'N/A' }}</td>
                                <td>{{ $somitee->branch->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="fw-bold text-primary">{{ $somitee->members->count() }}</span>
                                    <small class="text-muted">members</small>
                                </td>
                                <td>
                                    <a href="{{ route('somitees.show', $somitee->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="col-12">
        <div class="modern-card">
            <div class="modern-card-body text-center py-5">
                <div class="text-muted">
                    <i class="fas fa-users fa-3x mb-3 d-block"></i>
                    <h5>No Associated Committees</h5>
                    <p>This collection day hasn't been assigned to any committees yet.</p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.info-item {
    padding: 1rem 0;
    border-bottom: 1px solid #f1f3f4;
}

.info-item:last-child {
    border-bottom: none;
}
</style>
@endsection