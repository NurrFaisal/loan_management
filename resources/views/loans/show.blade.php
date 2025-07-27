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

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>ID:</strong> {{ $loan->id }}
                        </div>
                        <div class="mb-3">
                            <strong>Somitee:</strong> {{ $loan->somitee->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Member:</strong> {{ $loan->member->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Loan Amount:</strong> ${{ number_format($loan->loan_amount, 2) }}
                        </div>
                        <div class="mb-3">
                            <strong>Interest:</strong> {{ $loan->interest }}%
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong>Total Payable:</strong> ${{ number_format($loan->total_payable, 2) }}
                        </div>
                        <div class="mb-3">
                            <strong>Loan Type:</strong> {{ $loan->loan_type }}
                        </div>
                        <div class="mb-3">
                            <strong>Installment:</strong> ${{ number_format($loan->installment, 2) }}
                        </div>
                        <div class="mb-3">
                            <strong>Status:</strong> 
                            <span class="badge bg-{{ $loan->status == 'approved' ? 'success' : ($loan->status == 'pending' ? 'warning' : ($loan->status == 'completed' ? 'primary' : 'danger')) }}">
                                {{ ucfirst($loan->status) }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <strong>Created:</strong> {{ $loan->created_at->format('M d, Y') }}
                        </div>
                    </div>
                </div>

                @if($loan->loan_type == 'Monthly')
                    <div class="alert alert-info mt-3">
                        <strong>Payment Schedule:</strong> 12 monthly installments of ${{ number_format($loan->installment, 2) }} each
                    </div>
                @elseif($loan->loan_type == 'Weekly')
                    <div class="alert alert-info mt-3">
                        <strong>Payment Schedule:</strong> 48 weekly installments of ${{ number_format($loan->installment, 2) }} each
                    </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('loans.index') }}" class="btn btn-secondary">Back to List</a>
                    <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-primary">Edit Loan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection