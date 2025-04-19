@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Users</h4>
                    <div class="card-tool">
                        <a class="btn btn-brown text-white btn-sm" href="{{ route('users.index') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                        autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control" required>
                                        <option {{ old('role')=='admin'?'selected':'' }} value="admin">Admin</option>
                                        <option {{ old('role')=='operator'?'selected':'' }} value="operator">Operator</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3 border-top p-3">
                                <div class="form-group">
                                    <small class="form-text text-muted">Kosongkan jika tidak ingin merubah password</small>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" value=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" value=""
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary text-white">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
