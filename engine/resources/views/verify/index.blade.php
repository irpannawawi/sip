@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">
                        <span class="text-success">&#9679;</span> Maintenance Verification
                    </h4>
                    {{-- <div class="card-tools">
                    <a class="btn btn-sm btn-brown" href="{{ route('request.create') }}">Create Mt Request</a>
                </div> --}}
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive table-sm table-striped table-bordered display"
                        id="table">
                        <thead class="bg-brown text-white ">
                            <tr>
                                <th class="text-center">No MWO</th>
                                <th class="text-center">Request Date</th>
                                <th class="text-center">Requester</th>
                                <th class="text-center">Maintenance</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reqs as $req)
                                <tr>
                                    <td class="text-center">{{ $req->no_mwo }}</td>
                                    <td class="text-center">{{ $req->request_date->format('d-m-Y') }}</td>
                                    <td>
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td class="">Name</td>
                                                <td>:</td>
                                                <td>{{ $req->requester_name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="">Perihal</td>
                                                <td>:</td>
                                                <td style="text-align: justify">{{ $req->perihal }}</td>
                                            </tr>
                                            <tr>
                                                <td class="">Location</td>
                                                <td>:</td>
                                                <td style="text-align: justify">{{ $req->location }}</td>
                                            </tr>
                                            <tr>
                                                <td class="">Problem</td>
                                                <td>:</td>
                                                <td style="text-align: justify">{{ $req->problem }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    @if ($req->foto)
                                                        <img src="{{ asset('engine/public/images/' . $req->foto) }}" alt="Foto"
                                                            class="img-fluid"
                                                            style="max-width: 360px; max-height: 360px; object-fit: cover;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td>
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td class="">Name</td>
                                                <td>:</td>
                                                <td>{{ $req->verified_by }}</td>
                                            </tr>
                                            <tr>
                                                <td class="">Penyebab</td>
                                                <td>:</td>
                                                <td style="text-align: justify">{{ $req->caused }}</td>
                                            </tr>
                                            <tr>
                                                <td class="">Tindakan</td>
                                                <td>:</td>
                                                <td style="text-align: justify">{{ $req->action }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    @if ($req->foto)
                                                        <img src="{{ asset('images/' . $req->foto_verified) }}" alt="Foto"
                                                            class="img-fluid"
                                                            style="max-width: 360px; max-height: 360px; object-fit: cover;">
                                                    @else
                                                        No Image
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="text-center">
                                        @if ($req->status == 'Open')
                                            <span class="badge bg-info">Open</span>
                                        @elseif ($req->status == 'On Progress')
                                            <span class="badge bg-warning">On Progress</span>
                                        @else
                                            <span class="badge bg-success">Done</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('verify.destroy', $req) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" target="_blank"
                                                    href="{{ route('verify.print', $req) }}">Print</a>
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('verify.edit', $req) }}">Edit</a>
                                                <button onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger btn-sm" type="submit">Delete</button>
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
