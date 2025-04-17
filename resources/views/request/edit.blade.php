@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"><span class="text-danger">&#9679;</span> Edit Maintenance Request</h4>
                    <div class="card-tool">
                        <a class="btn btn-brown text-white btn-sm" href="{{ route('request.index') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('request.update', $maintenance) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="request_date">Date</label>
                                    <input type="date" name="request_date" class="form-control" value="{{ Illuminate\Support\Carbon::parse($maintenance->request_date)->format('Y-m-d') }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="requester_name">Requester Name</label>
                                    <input type="text" name="requester_name" class="form-control" value="{{ $maintenance->requester_name }}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <select name="perihal" class="form-control" required>
                                        <option value="" disabled selected>-- Pilih Perihal --</option>
                                        <option {{ $maintenance->perihal=='Perbaikan'?'selected':'' }} value="Perbaikan">Perbaikan</option>
                                        <option {{ $maintenance->perihal=='Pembuatan Baru'?'selected':'' }} value="Pembuatan Baru">Pembuatan Baru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="problem">Problem</label>
                                    <textarea name="problem" class="form-control" id="" cols="30" rows="10" required>{{ $maintenance->problem }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control" value="{{ $maintenance->location }}" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">foto</label>
                                    <input type="file" name="foto" class="form-control" value="" autocomplete="off">
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
