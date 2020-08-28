<table >
    
    <thead>
    <tr>
        <th> No  </th>
        <th>nama</th>
        <th>status</th>
        <th>keterangan</th>
        <th>tanggal absensi</th>
        <th>alamat</th>
        <th>longitude</th>
        <th>latitude</th>
    </tr>
    </thead>
    <tbody>
    @foreach($absens as $result => $hasil)
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
        </tr>
    @endforeach
    </tbody>
</table>

