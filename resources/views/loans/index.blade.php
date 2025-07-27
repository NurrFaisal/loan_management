@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Loans') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between mb-3">
                    <h1 class="fs-4">Loans</h1>
                    <a href="{{ route('loans.create') }}" class="btn btn-primary">Add New Loan</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Somitee</th>
                            <th>Member</th>
                            <th>Loan Amount</th>
                            <th>Interest (%)</th>
                            <th>Total Payable</th>
                            <th>Loan Type</th>
                            <th>Installment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loans as $loan)
                            <tr>
                                <td>{{ $loan->id }}</td>
                                <td>{{ $loan->somitee->name }}</td>
                                <td>{{ $loan->member->name }}</td>
                                <td>${{ number_format($loan->loan_amount, 2) }}</td>
                                <td>{{ $loan->interest }}%</td>
                                <td>${{ number_format($loan->total_payable, 2) }}</td>
                                <td>{{ $loan->loan_type }}</td>
                                <td>${{ number_format($loan->installment, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $loan->status == 'approved' ? 'success' : ($loan->status == 'pending' ? 'warning' : ($loan->status == 'completed' ? 'primary' : 'danger')) }}">
                                        {{ ucfirst($loan->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('loans.show', $loan->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection