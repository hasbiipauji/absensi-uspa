<table>
    <tr>
        @if (auth()->user()->role=='admin')        
        @else
        <td>Nama : {{ auth()->user()->name }}</td>    
        @endif

    </tr>
    @if( isset($dari) )
        <tr>
            <td>Tanggal : {{ $dari }} sampai {{ $sampai }} </td>
        </tr>
    @else
    @endif
</table>

<table>
    <thead>
        <tr>
            <th>No</th>
            @if (auth()->user()->role=='admin')
            <th>Nama</th>
            @endif
            <th>Status</th>
            <th>Keterangan</th>
            <th>Alamat absensi</th>
            <th>Tanggal absensi</th>
            <th>Waktu</th>
            <th>Lokasi map</th>
            <th> </th>

        </tr>
    </thead>

    <tbody>
        @foreach($absens as $result => $hasil)
            <tr>
                {{-- ini untuk menampilkan nomor --}}
                <td>{{ strval($result+1) }}</td>

                
            @if (auth()->user()->role=='admin')
            
                {{-- menampilkan nama --}}
                <td>{{ $hasil->user->name }}</td>
                

            @endif

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

                <td> </td>

            </tr>
        @endforeach
    </tbody>
</table>
