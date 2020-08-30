<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <div style="overflow-x: auto">
        <table class="table table-striped table-hover table-sm table-bordered" style="width: 100% ; max-width:100%; white-space:nowrap;"  >
        <thead class="thead-dark">
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
