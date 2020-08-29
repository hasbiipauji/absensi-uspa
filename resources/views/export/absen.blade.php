<table>

    <thead>
        <tr>
            <th> No </th>
            <th>nama</th>
            <th>status</th>
            <th>keterangan</th>
            <th>alamat</th>
            <th>tanggal absensi</th>

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

                {{-- menampilkan alamat --}}
                <td>{{ $hasil->alamat }}</td>

                {{-- menampilkan tanggal dibuat --}}
                <td>{{ $hasil->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>
