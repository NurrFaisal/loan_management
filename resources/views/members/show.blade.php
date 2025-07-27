@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Member Details') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Member Details</h1>

                <div class="mb-3">
                    <strong>ID:</strong> {{ $member->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $member->name }}
                </div>
                <div class="mb-3">
                    <strong>Father/Husband Name:</strong> {{ $member->father_husband_name }}
                </div>
                <div class="mb-3">
                    <strong>Gender:</strong> {{ ucfirst($member->gender) }}
                </div>
                <div class="mb-3">
                    <strong>NID:</strong> {{ $member->nid }}
                </div>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ $member->phone }}
                </div>
                <div class="mb-3">
                    <strong>Photo:</strong><br>
                    @if ($member->photo)
                        <img src="{{ url('storage/' . $member->photo) }}" alt="Member Photo" class="img-thumbnail mt-2" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-light text-center d-flex align-items-center justify-content-center mt-2" style="width: 200px; height: 200px; border-radius: 8px;">
                            <div class="text-center">
                                <i class="fa fa-user fa-3x text-muted mb-2"></i>
                                <p class="text-muted">No photo uploaded</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Somitee:</strong> {{ $member->somitee->name }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> <span class="badge bg-{{ $member->status == 'active' ? 'success' : ($member->status == 'inactive' ? 'secondary' : 'warning') }}">{{ ucfirst($member->status) }}</span>
                </div>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $member->address }}
                </div>
                <div class="mb-3">
                    <strong>Admission Fee:</strong> ${{ number_format($member->admission_fee, 2) }}
                </div>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
