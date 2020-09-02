<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div style="width:100%; white-space:nowrap; font-size:9px;">
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Tanggal Absensi</th>
                    <th>Waktu</th>
                    <th>Alamat</th>
                    <th>Map Location</th>

                </tr>
            </thead>

            <tbody>
                @foreach($absensi as $result => $hasil)
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
                        <td>
                            @php
                                $dateold = $hasil->created_at;
                                $datenew = explode(" ", $dateold);

                                echo(date('d',strtotime($datenew[0]))." ");
                                echo($monthNames[date('m',strtotime($datenew[0]))]);
                                echo(" ".date('Y',strtotime($datenew[0])));

                            @endphp
                        </td>

                        {{-- menampilkan waktu --}}
                        <td>{{ date('H:i',strtotime($datenew[1])) }}</td>

                        {{-- menampilkan alamat --}}
                        <td>{{ $hasil->alamat }}</td>

                        {{-- menampilkan map --}}
                        @if($hasil->latitude==true)
                            <td>
                                <a
                                    href="http://maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}">maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}</a>
                            </td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>
