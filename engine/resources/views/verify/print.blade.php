<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Detail Maintenance</h3>
    <table class="table table-bordered table-sm">
        <tr>
            <td>No MWO</td>
            <td>{{ $maintenance->no_mwo }}</td>
        </tr>
        <tr>
            <td>Request Date</td>
            <td>{{ Illuminate\Support\Carbon::parse($maintenance->request_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>REQUESTER</th>
            <th>MAINTENANCE</th>
        </tr>
        <tr>
            <td>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Name</td>
                        <td>: {{ $maintenance->requester_name }}</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>: {{ $maintenance->perihal }}</td>
                    </tr>
                    <tr>
                        <td>Problem</td>
                        <td>: {{ $maintenance->problem }}</td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>: {{ $maintenance->location }}</td>
                    </tr>
                </table>
            </td>

            {{-- maintenance --}}
            <td>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $maintenance->verified_by }}</td>
                    </tr>
                    <tr>
                        <td>Penyebab</td>
                        <td>:</td>
                        <td>{{ $maintenance->caused }}</td>
                    </tr>
                    <tr>
                        <td>Tindakan</td>
                        <td>:</td>
                        <td>{{ $maintenance->action }}</td>
                    </tr>
                    <tr>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                @if ($maintenance->foto)
                    <img src="{{ asset('images/' . $maintenance->foto) }}" alt="Foto" width="360">
                @else
                    No Image
                @endif
            </td>
            <td class="text-center">
                @if ($maintenance->foto_verified)
                    <img src="{{ asset('images/' . $maintenance->foto_verified) }}" alt="Foto" width="360">
                @else
                    No Image
                @endif
            </td>
            
        </tr>
    </table>
    <div class="row gx-5">
        <div class="col-6 ">

        </div>
        <div class="col-6 ">

        </div>
    </div>



    <br>
    <table width="100%" style="border: 0px solid #ddd">
        <tr>
            <td style="width: 50%; padding: 10px; border-right: 0px solid #ddd">
                <p style="text-align: center">
                    {{ Illuminate\Support\Carbon::parse($maintenance->request_date)->format('d F Y') }} <br>
                    <b>Maintenance</b>
                </p>
                <p style="text-align: center; margin-top: 50px">{{ $maintenance->verified_by }}</p>
            </td>
            <td style="width: 50%; padding: 10px">
                <p style="text-align: center">
                    <br>
                    <b>Requester</b>
                </p>
                <p style="text-align: center; margin-top: 50px">{{ $maintenance->requester_name }}</p>
            </td>
        </tr>
    </table>
    <script>window.print()</script>
</body>

</html>
