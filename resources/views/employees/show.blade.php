@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Employee Details') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Employee Details</h1>

                <div class="mb-3">
                    <strong>ID:</strong> {{ $employee->id }}
                </div>
                <div class="mb-3">
                    <strong>Name:</strong> {{ $employee->name }}
                </div>
                <div class="mb-3">
                    <strong>Father Name:</strong> {{ $employee->father_name }}
                </div>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $employee->address }}
                </div>
                <div class="mb-3">
                    <strong>NID:</strong> {{ $employee->nid }}
                </div>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ $employee->phone }}
                </div>
                <div class="mb-3">
                    <strong>Salary:</strong> {{ $employee->salary }}
                </div>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
