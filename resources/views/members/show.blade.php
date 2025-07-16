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
                    <strong>NID:</strong> {{ $member->nid }}
                </div>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ $member->phone }}
                </div>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $member->address }}
                </div>
                <div class="mb-3">
                    <strong>Photo:</strong>
                    @if ($member->photo)
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="Member Photo" width="100">
                    @else
                        N/A
                    @endif
                </div>
                <div class="mb-3">
                    <strong>Somitee:</strong> {{ $member->somitee->name }}
                </div>
                <div class="mb-3">
                    <strong>Day:</strong> {{ $member->day->name }}
                </div>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
