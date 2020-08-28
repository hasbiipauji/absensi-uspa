@extends('template_backend.master')
@section('sub-judul', 'Pegawai')

@section('content')

{{-- <a href="{{ route('print.pdf') }}" class="btn btn-primary btn-sm">Cetak pdf</a> --}}
<a href="{{ route('pegawai.create') }}" class="btn btn-info btn-sm" style="float: right">Tambah Pegawai</a>
<br>
<br>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>

            <th>Nama Pegawai</th>
            <th>email</th>
            <th>jabatan</th>
            <th>Action</th>
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
            <td>
                <form action="{{ route('pegawai.destroy', $hasil->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('pegawai.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus {{ $hasil->pegawai }}?">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pegawai->links() }}

@endsection
