@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Somitee Details') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Somitee Details</h1>

                <div class="mb-3">
                    <strong>ID:</strong> {{ $somitee->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $somitee->name }}
                </div>
                <div class="mb-3">
                    <strong>Employee:</strong> {{ $somitee->employee->name }}
                </div>
                <div class="mb-3">
                    <strong>Branch:</strong> {{ $somitee->branch->name }}
                </div>
                <div class="mb-3">
                    <strong>Day:</strong> {{ $somitee->day->name }}
                </div>
                <a href="{{ route('somitees.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
