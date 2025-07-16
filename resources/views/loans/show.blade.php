@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Loan Details') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Loan Details</h1>

                <div class="mb-3">
                    <strong>ID:</strong> {{ $loan->id }}
                </div>
                <div class="mb-3">
                    <strong>Member:</strong> {{ $loan->member->name }}
                </div>
                <div class="mb-3">
                    <strong>Somitee:</strong> {{ $loan->somitee->name }}
                </div>
                <div class="mb-3">
                    <strong>Loan Amount:</strong> {{ $loan->loan_amount }}
                </div>
                <div class="mb-3">
                    <strong>Loan Purpose:</strong> {{ $loan->loan_purpose }}
                </div>
                <div class="mb-3">
                    <strong>Status:</strong> {{ $loan->status }}
                </div>
                <div class="mb-3">
                    <strong>Day:</strong> {{ $loan->day->name }}
                </div>
                <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
