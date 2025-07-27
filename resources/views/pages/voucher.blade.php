@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vouchers') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="fs-4 mb-3">Vouchers</h1>
                
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
@endsection
