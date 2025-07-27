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

                <form action="{{ route('loans.update', $loan->id) }}" method="POST" id="loanForm">
                    @csrf
                    @method('PUT')
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
                        <label for="member_id" class="form-label">Member</label>
                        <select class="form-control" id="member_id" name="member_id" required>
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}" data-somitee="{{ $member->somitee_id }}" {{ old('member_id', $loan->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
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
                        <label for="interest" class="form-label">Interest (%)</label>
                        <input type="number" step="0.01" class="form-control" id="interest" name="interest" value="{{ old('interest', $loan->interest) }}" required>
                        @error('interest')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_payable" class="form-label">Total Payable (Auto Calculated)</label>
                        <input type="number" step="0.01" class="form-control" id="total_payable" name="total_payable" value="{{ old('total_payable', $loan->total_payable) }}" readonly required>
                        @error('total_payable')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="loan_type" class="form-label">Loan Type</label>
                        <select class="form-control" id="loan_type" name="loan_type" required>
                            <option value="">Select Loan Type</option>
                            <option value="Weekly" {{ old('loan_type', $loan->loan_type) == 'Weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="Monthly" {{ old('loan_type', $loan->loan_type) == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                        </select>
                        @error('loan_type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="installment" class="form-label">Installment (Auto Calculated)</label>
                        <input type="number" step="0.01" class="form-control" id="installment" name="installment" value="{{ old('installment', $loan->installment) }}" readonly required>
                        @error('installment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="pending" {{ old('status', $loan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $loan->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ old('status', $loan->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="completed" {{ old('status', $loan->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        @error('status')
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const somiteeSelect = document.getElementById('somitee_id');
    const memberSelect = document.getElementById('member_id');
    const loanAmountInput = document.getElementById('loan_amount');
    const interestInput = document.getElementById('interest');
    const totalPayableInput = document.getElementById('total_payable');
    const loanTypeSelect = document.getElementById('loan_type');
    const installmentInput = document.getElementById('installment');

    // Filter members by selected somitee
    somiteeSelect.addEventListener('change', function() {
        const selectedSomiteeId = this.value;
        const memberOptions = memberSelect.querySelectorAll('option');
        
        // Show/hide member options based on selected somitee
        memberOptions.forEach(option => {
            if (option.value === '') {
                option.style.display = 'block';
            } else {
                const memberSomiteeId = option.getAttribute('data-somitee');
                option.style.display = (memberSomiteeId === selectedSomiteeId) ? 'block' : 'none';
            }
        });
    });

    // Calculate total payable when loan amount or interest changes
    function calculateTotalPayable() {
        const loanAmount = parseFloat(loanAmountInput.value) || 0;
        const interest = parseFloat(interestInput.value) || 0;
        
        if (loanAmount > 0 && interest >= 0) {
            const totalPayable = loanAmount + (loanAmount * interest / 100);
            totalPayableInput.value = totalPayable.toFixed(2);
            calculateInstallment();
        } else {
            totalPayableInput.value = '';
            installmentInput.value = '';
        }
    }

    // Calculate installment when total payable or loan type changes
    function calculateInstallment() {
        const totalPayable = parseFloat(totalPayableInput.value) || 0;
        const loanType = loanTypeSelect.value;
        
        if (totalPayable > 0 && loanType) {
            let installment = 0;
            if (loanType === 'Monthly') {
                installment = totalPayable / 12;
            } else if (loanType === 'Weekly') {
                installment = totalPayable / 48;
            }
            installmentInput.value = installment.toFixed(2);
        } else {
            installmentInput.value = '';
        }
    }

    // Event listeners for calculations
    loanAmountInput.addEventListener('input', calculateTotalPayable);
    interestInput.addEventListener('input', calculateTotalPayable);
    loanTypeSelect.addEventListener('change', calculateInstallment);

    // Initialize member filtering if there's a somitee selection
    if (somiteeSelect.value) {
        somiteeSelect.dispatchEvent(new Event('change'));
    }

    // Initialize calculations if there are values
    if (loanAmountInput.value || interestInput.value) {
        calculateTotalPayable();
    }
});
</script>
@endsection