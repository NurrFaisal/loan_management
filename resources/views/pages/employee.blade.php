@section('title', 'Employees | Gremeen')
@extends('layouts.layout')

@section('content')
    <div class="normal-table-area">
        <div class="container">
            <div class="modal fade" id="employeeModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>New Employee</h2>
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
                                                    <label>Father Name</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" name="father_name" class="form-control input-sm" value="{{ old('father_name') }}">
                                                    </div>
                                                    @error('father_name')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <div class="nk-int-st">
                                                        <textarea name="address" class="form-control" rows="5" >{{ old('address') }}</textarea>
                                                    </div>
                                                    @error('address')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label>NID</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" name="nid" class="form-control input-sm" value="{{ old('nid') }}">
                                                    </div>
                                                    @error('nid')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" name="phone" class="form-control input-sm" value="{{ old('phone') }}">
                                                    </div>
                                                    @error('phone')
                                                    <p style="color: red" class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label>Salary</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" name="salary" class="form-control input-sm" value="{{ old('salary') }}">
                                                    </div>
                                                    @error('salary')
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
                            <h2 class="pull-left">Employees</h2>
                            <button type="button" style="background: #00c292; color: #fff" class="btn btn-default pull-right" data-toggle="modal" data-target="#employeeModal">Add New</button>
                        </div>

                        <div class="bsc-tbl-bdr">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Loan</th>
                                    <th>Savince</th>
                                    <th>DPS</th>
                                    <th>Insorence</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Alexandra</td>
                                    <td>10000</td>
                                    <td>100</td>
                                    <td>300</td>
                                    <td>100</td>
                                    <td>#</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
