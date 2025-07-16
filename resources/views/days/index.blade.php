@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Days') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between mb-3">
                    <h1 class="fs-4">Days</h1>
                    <a href="{{ route('days.create') }}" class="btn btn-primary">Add New Day</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($days as $day)
                            <tr>
                                <td>{{ $day->id }}</td>
                                <td>{{ $day->name }}</td>
                                <td>
                                    <a href="{{ route('days.show', $day->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('days.edit', $day->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('days.destroy', $day->id) }}" method="POST" class="d-inline">
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
