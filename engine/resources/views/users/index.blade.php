@extends('layouts.app')

@section('content')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Users</h4>
                <div class="card-tools">
                    <a class="btn btn-sm btn-brown" href="{{ route('users.create') }}">Create User</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-responsive table-sm table-striped table-bordered display" id="table">
                    <thead class="bg-brown text-white ">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ ucfirst($user->role) }}</td>
                                <td class="text-end">
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user) }}">Edit</a>
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </div>
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