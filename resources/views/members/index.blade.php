@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Members') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="d-flex justify-content-between mb-3">
                    <h1 class="fs-4">Members</h1>
                    <a href="{{ route('members.create') }}" class="btn btn-primary">Add New Member</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>NID</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Somitee</th>
                            <th>Day</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->nid }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->address }}</td>
                                <td>
                                    @if ($member->photo)
                                        <img src="{{ asset('storage/' . $member->photo) }}" alt="Member Photo" width="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $member->somitee->name }}</td>
                                <td>{{ $member->day->name }}</td>
                                <td>
                                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
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
