<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<table>
    
    @if( isset($dari) )
        <tr>
            <td>Tanggal : 
                
                @php
                        $dateold1 = $dari;
                        $datenew1 = explode(" ", $dateold1);
                        echo(date('d',strtotime($datenew1[0]))." ");
                        echo($monthNames[date('m',strtotime($datenew1[0]))]);
                        echo(" ".date('Y',strtotime($datenew1[0])));
                @endphp
                 sampai 
                
                 
                @php
                    $dateold2 = $sampai;
                    $datenew2 = explode(" ", $dateold2);
                    echo(date('d',strtotime($datenew2[0]))." ");
                    echo($monthNames[date('m',strtotime($datenew2[0]))]);
                    echo(" ".date('Y',strtotime($datenew2[0])));
                @endphp

                </td>
        </tr>
        <tr>
            <td></td>
        </tr>
    @else
    @endif
</table>
<div style="width:100%; white-space:nowrap; font-size:9px;">

<table class="table table-striped table-hover table-sm table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>nama</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Alamat absensi</th>
            <th>Tanggal absensi</th>
            <th>Waktu</th>
            <th>Lokasi map</th>

        </tr>
    </thead>

    <tbody>
        @foreach($absens as $result => $hasil)
            <tr>
                {{-- ini untuk menampilkan nomor --}}
                <td>{{ strval($result+1) }}</td>

                {{-- menampilkan status --}}
                <td>{{ $hasil->user->name }}</td>

                {{-- menampilkan status --}}
                <td>{{ $hasil->status }}</td>

                {{-- menampilkan keterangan --}}
                <td>{{ $hasil->keterangan }}</td>

                {{-- menampilkan alamat --}}
                <td>{{ $hasil->alamat }}</td>

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

                {{-- menampilkan map --}}
                @if($hasil->latitude==true)
                    <td>
                        <a
                            href="http://maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}">http://maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}</a>
                    </td>
                @else
                    <td></td>
                @endif


            </tr>
        @endforeach
    </tbody>
</table>
</div>