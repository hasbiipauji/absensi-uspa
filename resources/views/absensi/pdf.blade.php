<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div style="overflow-x: auto">
        <table class="table table-striped table-hover table-sm table-bordered" style="width: 100% ; max-width:100%; white-space:nowrap;"  >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Tanggal Absensi</th>
                <th>Alamat</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Map Location</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($absensi as $result => $hasil)
            <tr>
                {{-- ini untuk menampilkan nomor --}}
                <td>{{ $result + 1 }}</td>

                {{-- menampilkan nama dari model User --}}
                <td>{{ $hasil->user->name }}</td>

                {{-- menampilkan status --}}
                <td>{{ $hasil->status }}</td>

                {{-- menampilkan keterangan --}}
                <td>{{ $hasil->keterangan }}</td>

                {{-- menampilkan tanggal dibuat --}}
                <td>{{ $hasil->created_at }}</td>

                {{-- menampilkan alamat --}}
                <td>{{ $hasil->alamat }}</td>

                {{-- menampilkan longitude --}}
                <td>{{ $hasil->longitude }}</td>

                {{-- menampilkan latitude --}}
                <td>{{ $hasil->latitude }}</td>

                {{-- menampilkan map --}}
                @if ($hasil->latitude==true)
                    <td><a href="/location/{{ $hasil->id }}">lihat lokasi</a></td>
                @else
                  <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</body>
</html>
