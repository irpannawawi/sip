@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Create Maintenance Request</h4>
                <div class="card-tools">
                    <a class="btn btn-sm btn-brown" href="{{ route('request.index') }}">Back</a>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('request.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="request_date">Date</label>
                                <input type="date" name="request_date" class="form-control" value="{{ old('request_date')!=''?old('request_date'):date('Y-m-d') }}" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="requester_name">Requester Name</label>
                                <input type="text" name="requester_name" class="form-control" value="{{ old('requester_name') }}" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label for="perihal">Perihal</label>
                                <select name="perihal" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Perihal --</option>
                                    <option {{ old('perihal')=='Perbaikan'?'selected':'' }} value="Perbaikan">Perbaikan</option>
                                    <option {{ old('perihal')=='Pembuatan Baru'?'selected':'' }} value="Pembuatan Baru">Pembuatan Baru</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="problem">Problem</label>
                                <textarea name="problem" class="form-control" id="" cols="30" rows="10" required>{{ old('problem') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location') }}" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">foto</label>
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection