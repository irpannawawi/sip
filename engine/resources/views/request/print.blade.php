<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h3 class="text-center">Detail Maintenance</h3>
    <table class="table table-bordered table-sm">
        <tr>
            <td>No MWO</td>
            <td>: {{ $maintenance->no_mwo }}</td>
        </tr>
        <tr>
            <td>Request Date</td>
            <td>: {{ Illuminate\Support\Carbon::parse($maintenance->request_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Requester Name</td>
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
        <tr>
            <td>Status</td>
            <td>: {{ ucfirst($maintenance->status) }}</td>
        </tr>
        <tr>
            <td colspan="2">Foto</td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                @if ($maintenance->foto)
                    <img src="{{ asset('images/' . $maintenance->foto) }}" alt="Foto" width="360">
                @else
                    No Image
                @endif
            </td>
        </tr>
    </table>


    <br>
    <table width="100%" style="border: 0px solid #ddd">
        <tr>
            <td style="width: 50%; padding: 10px; border-right: 0px solid #ddd">
                
            </td>
            <td style="width: 50%; padding: 10px">
                <p style="text-align: center">{{ Illuminate\Support\Carbon::parse($maintenance->request_date)->format('d F Y') }} <br>
                    <b>Requester</b></p>
                <p style="text-align: center; margin-top: 50px">{{ $maintenance->requester_name }}</p>
            </td>
        </tr>
    </table>
    {{-- <script>window.print()</script> --}}
  </body>
</html>
    
