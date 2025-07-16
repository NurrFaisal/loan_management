@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Insurances') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between mb-3">
                    <h1 class="fs-4">Insurances</h1>
                    <a href="{{ route('insurances.create') }}" class="btn btn-primary">Add New Insurance</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Member</th>
                            <th>Somitee</th>
                            <th>Insurance Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($insurances as $insurance)
                            <tr>
                                <td>{{ $insurance->id }}</td>
                                <td>{{ $insurance->member->name }}</td>
                                <td>{{ $insurance->somitee->name }}</td>
                                <td>{{ $insurance->insurance_amount }}</td>
                                <td>{{ $insurance->status }}</td>
                                <td>
                                    <a href="{{ route('insurances.show', $insurance->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('insurances.edit', $insurance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('insurances.destroy', $insurance->id) }}" method="POST" class="d-inline">
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
