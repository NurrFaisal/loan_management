@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Somitee') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Edit Somitee</h1>

                <form action="{{ route('somitees.update', $somitee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $somitee->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee</label>
                        <select class="form-control" id="employee_id" name="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id', $somitee->employee_id) == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="branch_id" class="form-label">Branch</label>
                        <select class="form-control" id="branch_id" name="branch_id" required>
                            <option value="">Select Branch</option>
                            @foreach ($branches as $branch)
                                <option value="{{ $branch->id }}" {{ old('branch_id', $somitee->branch_id) == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="day_id" class="form-label">Day</label>
                        <select class="form-control" id="day_id" name="day_id" required>
                            <option value="">Select Day</option>
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}" {{ old('day_id', $somitee->day_id) == $day->id ? 'selected' : '' }}>{{ $day->name }}</option>
                            @endforeach
                        </select>
                        @error('day_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="somitee_day_id" class="form-label">Collection Day</label>
                        <select class="form-control" id="somitee_day_id" name="somitee_day_id">
                            <option value="">Select Collection Day</option>
                            @foreach ($somiteeDays as $somiteeDay)
                                <option value="{{ $somiteeDay->id }}" {{ old('somitee_day_id', $somitee->somitee_day_id) == $somiteeDay->id ? 'selected' : '' }}>
                                    {{ $somiteeDay->weekday }}
                                    @if($somiteeDay->collection_time) 
                                        - {{ \Carbon\Carbon::parse($somiteeDay->collection_time)->format('h:i A') }}
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        @error('somitee_day_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Select the weekday for committee collections</small>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $somitee->description) }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('somitees.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
