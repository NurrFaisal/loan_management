@extends('layouts.layout')
@section('title', 'Somitees | Grameen')

@section('content')
    <div class="normal-table-area">
        <div class="container">

            <!-- Modal for Adding Somitee -->
            <div class="modal fade" id="somiteeModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('somitees.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">New Somitee</h2>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-example-wrap">

                                            {{-- Somitee Name --}}
                                            <div class="form-example-int">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" id="name" name="name" class="form-control input-sm" value="{{ old('name') }}">
                                                    </div>
                                                    @error('name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Employee --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="employee_id">Employee</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="employee_id" id="employee_id" class="form-control input-sm chosen" data-placeholder="Select an Employee">
                                                            <option value="">Select One</option>
                                                            @foreach($employees as $employee)
                                                                <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('employee_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Branch --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="branch_id">Branch</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="branch_id" id="branch_id" class="form-control input-sm chosen" data-placeholder="Select a Branch">
                                                            <option value="">Select One</option>
                                                            @foreach($branches as $branch)
                                                                <option value="{{ $branch->id }}" {{ old('branch_id') == $branch->id ? 'selected' : '' }}>
                                                                    {{ $branch->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('branch_id')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Day --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="day_id">Day</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="day_id" id="day_id" class="form-control input-sm chosen" data-placeholder="Select a Day">
                                                            <option value="">Select One</option>
                                                            @foreach($days as $day)
                                                                <option value="{{ $day->id }}" {{ old('day_id') == $day->id ? 'selected' : '' }}>
                                                                    {{ $day->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('day_id')
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

            {{-- Somitee List --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd clearfix">
                            <h2 class="pull-left">Somitees</h2>
                            <button type="button" class="btn btn-default pull-right" style="background:#00c292; color:#fff" data-toggle="modal" data-target="#somiteeModal">
                                Add New
                            </button>
                        </div>

                        <div class="bsc-tbl-bdr">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Employee</th>
                                    <th>Branch</th>
                                    <th>Day</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($somitees as $somitee)
                                    <tr>
                                        <td>{{ $somitee->id }}</td>
                                        <td>{{ $somitee->name }}</td>
                                        <td>{{ $somitee->employee->name ?? 'N/A' }}</td>
                                        <td>{{ $somitee->branch->name ?? 'N/A' }}</td>
                                        <td>{{ $somitee->day->name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('somitees.show', $somitee->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('somitees.edit', $somitee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('somitees.destroy', $somitee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Somitees Found.</td>
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

    {{-- Notifications --}}
    <style>
        #date_input {
            font-size: 14px;
            font-weight: 400;
        }
    </style>

@endsection
