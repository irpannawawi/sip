@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Edit Maintenance Request</h4>
                    <div class="card-tool">
                        <a class="btn btn-brown text-white btn-sm" href="{{ route('verify.index') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title mb-3 text-center">Maintenance Request</h5>
                    <div class="row mb-3">
                        <div class="col-md-6 border-end border-right">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="">No MWO</td>
                                    <td>:</td>
                                    <td>{{ $maintenance->no_mwo }}</td>
                                </tr>
                                <tr>
                                    <td class="">Request Date</td>
                                    <td>:</td>
                                    <td>{{ $maintenance->request_date->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="">Requester Name</td>
                                    <td>:</td>
                                    <td>{{ $maintenance->requester_name }}</td>
                                </tr>
                                <tr>
                                    <td class="">Perihal</td>
                                    <td>:</td>
                                    <td style="text-align: justify">{{ $maintenance->perihal }}</td>
                                </tr>
                                <tr>
                                    <td class="">Location</td>
                                    <td>:</td>
                                    <td style="text-align: justify">{{ $maintenance->location }}</td>
                                </tr>
                                <tr>
                                    <td class="">Problem</td>
                                    <td>:</td>
                                    <td style="text-align: justify">{{ $maintenance->problem }}</td>
                                </tr>
                                <tr>
                                    <td class="">Status</td>
                                    <td>:</td>
                                    <td>{{ $maintenance->status }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            @if ($maintenance->foto)
                                <img src="{{ asset('images/' . $maintenance->foto) }}" alt="Foto" class="img-fluid"
                                    style="width: 100%; object-fit: cover;">
                            @else
                                <span class="text-danger">No Image</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                Please fill in the form below to edit the maintenance.
                            </div>
                        </div>  
                    </div>
                    <form action="{{ route('verify.update', $maintenance) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="verified_date">Date</label>
                                    <input type="date" name="verified_date" class="form-control"
                                        value="{{ Illuminate\Support\Carbon::parse($maintenance->verified_date)->format('Y-m-d') }}"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="verified_by">Maintener Name</label>
                                    <input type="text" name="verified_by" class="form-control"
                                        value="{{ $maintenance->verified_by }}" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 ">
                                <div class="form-group mb-3">
                                    <label for="caused">Penyebab</label>
                                    <textarea name="caused" class="form-control" id="" cols="30" rows="10">{{ $maintenance->caused }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="action">Tindakan</label>
                                    <textarea name="action" class="form-control" id="" cols="30" rows="10" required>{{ $maintenance->action }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="foto">foto</label>
                                    <input type="file" name="foto_verified" class="form-control" value=""
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="Open" {{ $maintenance->status == 'Open' ? 'selected' : '' }}>
                                            Open</option>
                                            <option value="On Progress" {{ $maintenance->status == 'On Progress' ? 'selected' : '' }}>
                                                On Progress</option>
                                        <option value="Done" {{ $maintenance->status == 'Done' ? 'selected' : '' }}>
                                            Done</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
