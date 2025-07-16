@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Insurance') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Edit Insurance</h1>

                <form action="{{ route('insurances.update', $insurance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-control" id="member_id" name="member_id" required>
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" {{ old('member_id', $insurance->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
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
                                <option value="{{ $somitee->id }}" {{ old('somitee_id', $insurance->somitee_id) == $somitee->id ? 'selected' : '' }}>{{ $somitee->name }}</option>
                            @endforeach
                        </select>
                        @error('somitee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="insurance_amount" class="form-label">Insurance Amount</label>
                        <input type="number" step="0.01" class="form-control" id="insurance_amount" name="insurance_amount" value="{{ old('insurance_amount', $insurance->insurance_amount) }}" required>
                        @error('insurance_amount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="active" {{ old('status', $insurance->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $insurance->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="completed" {{ old('status', $insurance->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('insurances.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
