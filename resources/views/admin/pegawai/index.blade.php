@extends('template_backend.master')
@section('sub-judul', 'List Pegawai')

@section('content')

{{-- <a href="{{ route('print.pdf') }}" class="btn btn-primary btn-sm">Cetak pdf</a> --}}

<a class="btn btn-primary" style="float: right" href="{{ route('pdf') }}">Export to PDF</a>

@if (auth()->user()->role == 'admin')
    <a href="{{ route('pegawai.create') }}" class="btn btn-info btn-sm">Tambah Pegawai</a>
@endif

<br>
<br>

<table class="container table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Jabatan</th>
            @if (auth()->user()->role == 'admin')
                <th>Action</th>
            @endif
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
            @if (auth()->user()->role == 'admin')
                <td>
                    <form action="{{ route('pegawai.destroy', $hasil->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('pegawai.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus {{ $hasil->pegawai }}?">Delete</button>
                    </form>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{ $pegawai->links() }}

@endsection
