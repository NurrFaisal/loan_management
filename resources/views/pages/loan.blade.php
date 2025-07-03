@extends('layouts.layout')
@section('title', 'Loans | Grameen')

@section('content')
    <div class="normal-table-area">
        <div class="container">

            <!-- Modal for Adding Loan -->
            <div class="modal fade" id="loanModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('loan.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">New Loan</h2>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-example-wrap">

                                            {{-- Somitee --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="somitee_id">Somitee</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="somitee_id" id="somitee_id" class="form-control input-sm chosen">
                                                            <option value="">Select Somitee</option>
                                                            @foreach($somitees as $somitee)
                                                                <option value="{{ $somitee->id }}" {{ old('somitee_id') == $somitee->id ? 'selected' : '' }}>
                                                                    {{ $somitee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('somitee_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Member --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="member_id">Member</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="member_id" id="member_id" class="form-control input-sm chosen">
                                                            <option value="">Select Member</option>
                                                            @foreach($members as $member)
                                                                <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                                                    {{ $member->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('member_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Day ID --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="day_id">Day ID</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="day_id" name="day_id" class="form-control input-sm" value="{{ old('day_id') }}">
                                                    </div>
                                                    @error('day_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Loan Amount --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="loan_amount">Loan Amount</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="loan_amount" name="loan_amount" class="form-control input-sm" value="{{ old('loan_amount') }}">
                                                    </div>
                                                    @error('loan_amount')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Interest (%) --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="interest">Interest (%)</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="interest" name="interest" class="form-control input-sm" value="{{ old('interest') }}">
                                                    </div>
                                                    @error('interest')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Total Loan --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="total_loan">Total Loan</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="total_loan" name="total_loan" class="form-control input-sm" value="{{ old('total_loan') }}">
                                                    </div>
                                                    @error('total_loan')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Loan Type --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="type">Loan Type</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" id="type" name="type" class="form-control input-sm" value="{{ old('type') }}">
                                                    </div>
                                                    @error('type')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Installment Count --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="installment">Installments</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="installment" name="installment" class="form-control input-sm" value="{{ old('installment') }}">
                                                    </div>
                                                    @error('installment')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Installment Amount --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="installment_amount">Installment Amount</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="installment_amount" name="installment_amount" class="form-control input-sm" value="{{ old('installment_amount') }}">
                                                    </div>
                                                    @error('installment_amount')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            {{-- Loans List --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd clearfix">
                            <h2 class="pull-left">Loans</h2>
                            <button type="button" class="btn btn-default pull-right" style="background:#00c292; color:#fff" data-toggle="modal" data-target="#loanModal">
                                Add New
                            </button>
                        </div>

                        <div class="bsc-tbl-bdr">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Somitee</th>
                                    <th>Member</th>
                                    <th>Day ID</th>
                                    <th>Loan Amount</th>
                                    <th>Interest (%)</th>
                                    <th>Total Loan</th>
                                    <th>Type</th>
                                    <th>Installments</th>
                                    <th>Installment Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($loans as $loan)
                                    <tr>
                                        <td>{{ $loan->id }}</td>
                                        <td>{{ $loan->somitee->name ?? '' }}</td>
                                        <td>{{ $loan->member->name ?? '' }}</td>
                                        <td>{{ $loan->day_id }}</td>
                                        <td>{{ $loan->loan_amount }}</td>
                                        <td>{{ $loan->interest }}</td>
                                        <td>{{ $loan->total_loan }}</td>
                                        <td>{{ $loan->type }}</td>
                                        <td>{{ $loan->installment }}</td>
                                        <td>{{ $loan->installment_amount }}</td>
                                        <td>#</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">No Loans Found.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
