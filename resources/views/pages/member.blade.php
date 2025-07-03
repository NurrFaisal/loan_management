@extends('layouts.layout')
@section('title', 'Members | Grameen')

@section('content')
    <div class="normal-table-area">
        <div class="container">

            <!-- Modal for Adding Member -->
            <div class="modal fade" id="memberModal" role="dialog">
                <div class="modal-dialog modal-large">
                    <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title">New Member</h2>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-example-wrap">

                                            {{-- Member Name --}}
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

                                            {{-- Father Name --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="father_name">Father's Name</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" id="father_name" name="father_name" class="form-control input-sm" value="{{ old('father_name') }}">
                                                    </div>
                                                    @error('father_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Gender --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="gender" id="gender" class="form-control input-sm chosen">
                                                            <option value="">Select Gender</option>
                                                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                                    @error('gender')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- NID --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="nid">NID</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="nid" name="nid" class="form-control input-sm" value="{{ old('nid') }}">
                                                    </div>
                                                    @error('nid')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <div class="nk-int-st">
                                                        <input type="text" id="phone" name="phone" class="form-control input-sm" value="{{ old('phone') }}">
                                                    </div>
                                                    @error('phone')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Somitee --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="somitee_id">Somitee</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="somitee_id" id="somitee_id" class="form-control input-sm chosen" data-placeholder="Select a Somitee">
                                                            <option value="">Select One</option>
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

                                            {{-- Photo --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="photo">Photo</label>
                                                    <div class="nk-int-st">
                                                        <input type="file" id="photo" name="photo" class="form-control input-sm">
                                                    </div>
                                                    @error('photo')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Address --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <div class="nk-int-st">
                                                        <textarea name="address" id="address" class="form-control" rows="4">{{ old('address') }}</textarea>
                                                    </div>
                                                    @error('address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Admission Fee --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="admission_fee">Admission Fee</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" id="admission_fee" name="admission_fee" class="form-control input-sm" value="{{ old('admission_fee') }}">
                                                    </div>
                                                    @error('admission_fee')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Status --}}
                                            <div class="form-example-int mg-t-15">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <div class="chosen-select-act nk-int-st">
                                                        <select name="status" id="status" class="form-control input-sm chosen">
                                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                    @error('status')
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

            {{-- Members List --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="basic-tb-hd clearfix">
                            <h2 class="pull-left">Members</h2>
                            <button type="button" class="btn btn-default pull-right" style="background:#00c292; color:#fff" data-toggle="modal" data-target="#memberModal">
                                Add New
                            </button>
                        </div>

                        <div class="bsc-tbl-bdr">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Father</th>
                                    <th>Gender</th>
                                    <th>NID</th>
                                    <th>Phone</th>
                                    <th>Somitee</th>
                                    <th>Day ID</th>
                                    <th>Address</th>
                                    <th>Admission Fee</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($members as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->father_name }}</td>
                                        <td>{{ $member->gender }}</td>
                                        <td>{{ $member->nid }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ $member->somitee->name ?? '' }}</td>
                                        <td>{{ $member->day_id }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->admission_fee }}</td>
                                        <td>
                                            @if($member->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>#</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center">No Members Found.</td>
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
