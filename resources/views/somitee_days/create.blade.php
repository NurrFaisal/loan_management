@section('title', 'Create Somitee Day | MicroFinance Pro')
@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="modern-card">
            <div class="modern-card-header">
                <div class="d-flex align-items-center">
                    <a href="{{ route('somitee_days.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h1 class="h4 mb-1">
                            <i class="fas fa-plus-circle text-primary me-2"></i>
                            Create New Collection Day
                        </h1>
                        <p class="text-muted mb-0">Add a new weekday for committee collections</p>
                    </div>
                </div>
            </div>
            <div class="modern-card-body">
                <form action="{{ route('somitee_days.store') }}" method="POST">
                    @csrf
                    
                    <div class="row g-3">
                        <!-- Weekday -->
                        <div class="col-md-6">
                            <label for="weekday" class="form-label fw-medium">
                                <i class="fas fa-calendar-day text-primary me-2"></i>Weekday *
                            </label>
                            <select class="form-select @error('weekday') is-invalid @enderror" 
                                    id="weekday" name="weekday" required>
                                <option value="">Select Weekday</option>
                                @foreach($weekdays as $key => $value)
                                    <option value="{{ $key }}" {{ old('weekday') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @error('weekday')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Collection Time -->
                        <div class="col-md-6">
                            <label for="collection_time" class="form-label fw-medium">
                                <i class="fas fa-clock text-primary me-2"></i>Collection Time
                            </label>
                            <input type="time" class="form-control @error('collection_time') is-invalid @enderror" 
                                   id="collection_time" name="collection_time" value="{{ old('collection_time') }}">
                            @error('collection_time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted">Optional: Set a specific collection time</small>
                        </div>

                        <!-- Status -->
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" 
                                       name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label fw-medium" for="is_active">
                                    <i class="fas fa-toggle-on text-success me-2"></i>Active Status
                                </label>
                                <small class="form-text text-muted d-block">Enable this day for committee assignments</small>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-12">
                            <label for="description" class="form-label fw-medium">
                                <i class="fas fa-file-alt text-primary me-2"></i>Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" 
                                      placeholder="Enter description or notes about this collection day...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small class="form-text text-muted">Optional: Add any notes or special instructions</small>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <a href="{{ route('somitee_days.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <button type="submit" class="modern-btn modern-btn-primary">
                            <i class="fas fa-save me-2"></i>Create Collection Day
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus first input
    document.getElementById('weekday').focus();
    
    // Preview weekday selection
    document.getElementById('weekday').addEventListener('change', function() {
        const selectedDay = this.value;
        if (selectedDay) {
            console.log('Selected day:', selectedDay);
        }
    });
});
</script>
@endsection