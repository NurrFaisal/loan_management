@section('title', 'Somitees | Gremeen')
@extends('layouts.layout')

@section('content')
    <div class="normal-table-area">
        <div class="container">
            <div class="modal fade" id="employeeModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('somitee.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>New Somitee</h2>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-example-wrap">
                                            <div class="form-example-int">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" name="name" class="form-control input-sm"  value="{{ old('name') }}">
                                                    </div>
                                                    @error('name')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="employee_id">Branch</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="employee_id" id="employee_id" class="form-control input-sm chosen" data-placeholder="Select a Branch">
                                                            <option value="">Select One</option>
                                                            @foreach($employees as $employee)
                                                                <option value="{{ $employee->id }}" {{ old('branch_id') == $employee->id ? 'selected' : '' }}>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('branch_id')
                                                    <p class="text-danger" style="color: red;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

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
                                                    <p class="text-danger" style="color: red;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="somitee_day">Somitee Day</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="somitee_day" id="somitee_day" class="form-control input-sm chosen" data-placeholder="Select a Day">
                                                            <option value="">Select One</option>
                                                            <option value="Saturday">Saturday</option>
                                                            <option value="Sunday">Sunday</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Friday">Friday</option>
                                                        </select>
                                                    </div>
                                                    @error('somitee_day')
                                                    <p class="text-danger" style="color: red;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-example-int">
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <div class="nk-int-st">
                                                        <input type="date" name="date" id="date" class="form-control input-sm" value="{{ old('date') }}">
                                                    </div>
                                                    @error('date')
                                                    <p class="text-danger" style="color: red;">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <div class="nk-int-st">
                                                        <textarea name="description" class="form-control" rows="5" >{{ old('description') }}</textarea>
                                                    </div>
                                                    @error('description')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd clearfix">
                            <h2 class="pull-left">Somitees</h2>
                            <button type="button" style="background: #00c292; color: #fff" class="btn btn-default pull-right" data-toggle="modal" data-target="#employeeModal">Add New</button>
                        </div>
                        <div class="bsc-tbl-bdr">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Employee Name</th>
                                    <th>Branch Name</th>
                                    <th>Day</th>
                                    <th>Somitee Day</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($somitees as $somitee)
                                    <tr>
                                        <td>{{$somitee->id}}</td>
                                        <td>{{$somitee->name}}</td>
                                        <td>{{$somitee->employee_id}}</td>
                                        <td>{{$somitee->branch_id}}</td>
                                        <td>{{$somitee->day_id}}</td>
                                        <td>{{$somitee->somitee_day}}</td>
                                        <td>{{$somitee->date}}</td>
                                        <td>#</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function ($) {
            "use strict";

            function notify(from, align, icon, type, animIn, animOut, message){
                $.growl({
                    icon: icon,
                    title: '',
                    message: message,
                    url: ''
                },{
                    element: 'body',
                    type: type,
                    allow_dismiss: true,
                    placement: {
                        from: from,
                        align: align
                    },
                    offset: {
                        x: 20,
                        y: 85
                    },
                    spacing: 10,
                    z_index: 1031,
                    delay: 2500,
                    timer: 2000,
                    url_target: '_blank',
                    mouse_over: false,
                    animate: {
                        enter: animIn,
                        exit: animOut
                    },
                    icon_type: 'class',
                    template: '<div data-growl="container" class="alert" role="alert">' +
                        '<button type="button" class="close" data-growl="dismiss">' +
                        '<span aria-hidden="true">&times;</span>' +
                        '<span class="sr-only">Close</span>' +
                        '</button>' +
                        '<span data-growl="icon"></span>' +
                        '<span data-growl="title"></span>' +
                        '<span data-growl="message"></span>' +
                        '<a href="#" data-growl="url"></a>' +
                        '</div>'
                });
            }

            $(document).ready(function () {
                @if(session('success'))
                notify('top', 'right', 'fa fa-check', 'success', 'animated fadeInDown', 'animated fadeOutUp', "{{ session('success') }}");
                @endif

                @if(session('error'))
                notify('top', 'right', 'fa fa-exclamation-triangle', 'danger', 'animated fadeInDown', 'animated fadeOutUp', "{{ session('error') }}");
                @endif

                @if($errors->any())
                @foreach($errors->all() as $error)
                notify('top', 'right', 'fa fa-times', 'danger', 'animated fadeInDown', 'animated fadeOutUp', "{{ $error }}");
                @endforeach
                @endif
            });
        })(jQuery);
    </script>
@endsection
