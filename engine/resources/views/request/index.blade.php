@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"><span class="text-danger">&#9679;</span> Maintenance Requests</h4>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-brown" href="{{ route('request.create') }}">Create Mt Request</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-responsive table-sm table-striped table-bordered display"
                        id="table">
                        <thead class="bg-brown text-white ">
                            <tr>
                                <th class="text-center">No MWO</th>
                                <th class="text-center">Request Date</th>
                                <th class="text-center">Requester Name</th>
                                <th class="text-center">Perihal</th>
                                <th class="text-center">Problem</th>
                                <th class="text-center">Location</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reqs as $req)
                                <tr>
                                    <td class="text-center">{{ $req->no_mwo }}</td>
                                    <td class="text-center">{{ $req->request_date->format('d-m-Y') }}</td>
                                    <td class="text-center">{{ $req->requester_name }}</td>
                                    <td class="text-center">{{ $req->perihal }}</td>
                                    <td class="text-center">{{ $req->problem }}</td>
                                    <td class="text-center">{{ $req->location }}</td>
                                    <td class="text-center">
                                        @if ($req->foto)
                                            <img src="{{ asset('images/' . $req->foto) }}" alt="Foto" width="50"
                                                height="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $req->status }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('request.destroy', $req) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" target="_blank"
                                                    href="{{ route('request.print', $req) }}">Print</a>
                                                @if (auth()->user()->role == 'admin')
                                                    <a class="btn btn-warning btn-sm"
                                                        href="{{ route('request.edit', $req) }}">Edit</a>
                                                    <button onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger btn-sm" type="submit">Delete</button>
                                                @endif
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
