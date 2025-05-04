@section('title', 'Employees | Gremeen')
@extends('layouts.layout')

@section('content')
    <div class="normal-table-area">
        <div class="container">
            <div class="modal fade" id="myModalthree" role="dialog">
                <div class="modal-dialog modal-large">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <h2>Modal title</h2>
                            <p>Curabitur blandit mollis lacus. Nulla sit amet est. Suspendisse nisl elit, rhoncus eget, elementum ac, condimentum eget, diam. Donec mi odio, faucibus at, scelerisque quis, convallis in, nisi. Cras sagittis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd clearfix">
                            <h2 class="pull-left">Employees</h2>
                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModalthree">Add New</button>
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
