@extends('template_backend.master')
@section('sub-judul', 'Print PDF')

@section('content')

<table class="table table-striped table-hover table-sm table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>email</th>
            <th>jabatan</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pegawai as $result => $hasil)
        <tr>
            {{-- ini untuk menampilkan nomor --}}
            <td>{{ $result + $pegawai->firstitem() }}</td>
            {{-- end --}}

            <td>{{ $hasil->name }}</td>
            <td>{{ $hasil->email }}</td>
            <td>{{ $hasil->jabatan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pegawai->links() }}

@endsection
