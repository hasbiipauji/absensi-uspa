<table>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>Nama : {{ $absens[0]->user->name }}</td>
    </tr>
    <tr>
        <td></td>
        <td>Tanggal : {{ $dari }}  sampai {{ $sampai }} </td>
    </tr>
</table>
<table>

    <thead>
        <tr>
            <th></th>
            <th>No</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Alamat</th>
            <th>Tanggal absensi</th>
            <th>Waktu</th>
            <th>Lokasi map</th>
            <th>  </th>

        </tr>
    </thead>
    <tbody>
        @foreach($absens as $result => $hasil)
            <tr>
                <td></td>
                {{-- ini untuk menampilkan nomor --}}
                <td>{{strval($result+1)}}</td>

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
                        echo($datenew[0]);
                    @endphp
                </td>

                {{-- menampilkan jam --}}
                <td>{{ $datenew[1] }}</td>


                {{-- menampilkan map --}}
                @if($hasil->latitude==true)
                 <td><a href="http://maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}">http://maps.google.com/maps?q={{ $hasil->latitude }},{{ $hasil->longitude }}</a></td>
                @else
                    <td></td>
                @endif

                <td>  </td>

            </tr>
        @endforeach
    </tbody>
</table>
