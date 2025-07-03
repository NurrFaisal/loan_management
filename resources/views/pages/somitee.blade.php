@extends('layouts.layout')
@section('title', 'Somitees | Grameen')

@section('content')
    <div class="normal-table-area">
        <div class="container">

            <!-- Modal for Adding Somitee -->
            <div class="modal fade" id="somiteeModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('somitee.store') }}" method="POST">
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

                                            {{-- Somitee Day --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="somitee_day">Somitee Day</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="somitee_day" id="somitee_day" class="form-control input-sm chosen" data-placeholder="Select a Day">
                                                            <option value="">Select One</option>
                                                            @foreach(['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                                                <option value="{{ $day }}" {{ old('somitee_day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('somitee_day')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Date Input --}}
                                            <div class="form-group nk-datapk-ctm form-elet-mg mg-t-15" id="data_1">
                                                <label style="font-weight: 400;" for="date_input">Date</label>
                                                <div class="input-group date nk-int-st">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" id="date_input" name="date" class="form-control input-sm @error('date') is-invalid @enderror" placeholder="MM/DD/YYYY" value="{{ old('date', $defaultDate ?? '') }}">
                                                </div>
                                                @error('date')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            {{-- Description --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <div class="nk-int-st">
                                                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                                    </div>
                                                    @error('description')
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
                                    <th>Day ID</th>
                                    <th>Somitee Day</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($somitees as $somitee)
                                    <tr>
                                        <td>{{ $somitee->id }}</td>
                                        <td>{{ $somitee->name }}</td>
                                        <td>{{ $somitee->employee_id }}</td>
                                        <td>{{ $somitee->branch_id }}</td>
                                        <td>{{ $somitee->day_id }}</td>
                                        <td>{{ $somitee->somitee_day }}</td>
                                        <td>{{ $somitee->date }}</td>
                                        <td>#</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Somitees Found.</td>
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
    <script>
        (function ($) {
            "use strict";

            function notify(from, align, icon, type, animIn, animOut, message) {
                $.growl({
                    icon: icon,
                    title: '',
                    message: message,
                    url: ''
                }, {
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: { from: from, align: align },
                    offset: { x: 20, y: 85 },
                    spacing: 10,
                    z_index: 1031,
                    delay: 2500,
                    timer: 2000,
                    url_target: '_blank',
                    animate: { enter: animIn, exit: animOut },
                    icon_type: 'class',
                    template: `
                <div data-growl="container" class="alert" role="alert">
                    <button type="button" class="close" data-growl="dismiss">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <span data-growl="icon"></span>
                    <span data-growl="title"></span>
                    <span data-growl="message"></span>
                    <a href="#" data-growl="url"></a>
                </div>`
                });
            }

            $(document).ready(function () {
                @if(session('success'))
                notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInDown', 'animated fadeOutUp', "{{ session('success') }}");
                @endif

                @if(session('error'))
                notify('top', 'right', 'fa fa-exclamation-triangle', 'danger', 'animated fadeInDown', 'animated fadeOutUp', "{{ session('error') }}");
                @endif

                @foreach ($errors->all() as $error)
                notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInDown', 'animated fadeOutUp', "{{ $error }}");
                @endforeach
            });
        })(jQuery);
    </script>
@endsection
