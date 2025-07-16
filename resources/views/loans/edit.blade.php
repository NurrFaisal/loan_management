@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Loan') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Edit Loan</h1>

                <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-control" id="member_id" name="member_id" required>
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" {{ old('member_id', $loan->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="somitee_id" class="form-label">Somitee</label>
                        <select class="form-control" id="somitee_id" name="somitee_id" required>
                            <option value="">Select Somitee</option>
                            @foreach ($somitees as $somitee)
                                <option value="{{ $somitee->id }}" {{ old('somitee_id', $loan->somitee_id) == $somitee->id ? 'selected' : '' }}>{{ $somitee->name }}</option>
                            @endforeach
                        </select>
                        @error('somitee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="loan_amount" class="form-label">Loan Amount</label>
                        <input type="number" step="0.01" class="form-control" id="loan_amount" name="loan_amount" value="{{ old('loan_amount', $loan->loan_amount) }}" required>
                        @error('loan_amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="loan_purpose" class="form-label">Loan Purpose</label>
                        <input type="text" class="form-control" id="loan_purpose" name="loan_purpose" value="{{ old('loan_purpose', $loan->loan_purpose) }}" required>
                        @error('loan_purpose')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending" {{ old('status', $loan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $loan->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ old('status', $loan->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="completed" {{ old('status', $loan->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="day_id" class="form-label">Day</label>
                        <select class="form-control" id="day_id" name="day_id" required>
                            <option value="">Select Day</option>
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}" {{ old('day_id', $loan->day_id) == $day->id ? 'selected' : '' }}>{{ $day->name }}</option>
                            @endforeach
                        </select>
                        @error('day_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
