@extends('layouts.dashboard')

@section('content')

<div class="row">
    {{-- Create User Start --}}
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Admin User</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('adduser') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Admin Name" name="admin_name">
                                @error('admin_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Enter Admin Email"
                                    name="email">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                        {{-- @if (session('category_added'))
                            <div class="text-success text-center mb-2">
                                {{ session('category_added') }}
                            </div>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Create User End --}}
</div>

{{-- View Users --}}
<div class="row">
    <div class="col-lg-12 m-auto">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-sm text-center">
                            <thead >
                                <tr>
                                    <th>#SL</th>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user )
                                <tr>
                                    <th> {{ $loop->iteration }} </th>
                                    <th> {{ $user->id }} </th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                @empty
                                <td>
                                    <div class="alert alert-info">
                                        No Users Found
                                    </div>
                                </td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
</div>
{{-- View Users --}}
@endsection
