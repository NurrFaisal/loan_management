@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Member') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Edit Member</h1>

                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $member->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nid" class="form-label">NID</label>
                        <input type="text" class="form-control" id="nid" name="nid" value="{{ old('nid', $member->nid) }}" required>
                        @error('nid')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $member->address) }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($member->photo)
                            <img src="{{ asset('storage/' . $member->photo) }}" alt="Member Photo" width="100" class="mt-2">
                        @endif
                        @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="somitee_id" class="form-label">Somitee</label>
                        <select class="form-control" id="somitee_id" name="somitee_id" required>
                            <option value="">Select Somitee</option>
                            @foreach ($somitees as $somitee)
                                <option value="{{ $somitee->id }}" {{ old('somitee_id', $member->somitee_id) == $somitee->id ? 'selected' : '' }}>{{ $somitee->name }}</option>
                            @endforeach
                        </select>
                        @error('somitee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="day_id" class="form-label">Day</label>
                        <select class="form-control" id="day_id" name="day_id" required>
                            <option value="">Select Day</option>
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}" {{ old('day_id', $member->day_id) == $day->id ? 'selected' : '' }}>{{ $day->name }}</option>
                            @endforeach
                        </select>
                        @error('day_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
