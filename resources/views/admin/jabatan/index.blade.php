@extends('template_backend.master')
@section('sub-judul', 'Jabatan')
@section('title', 'Jabatan')


@section('content')

<a href="{{ route('jabatan.create') }}" class="btn btn-info btn-sm">Tambah Jabatan</a>
<br>
<br>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($jabatan as $result => $hasil)
        <tr>
            {{-- ini untuk menampilkan nomor --}}
            <td>{{ $result + $jabatan->firstitem() }}</td>
            {{-- end --}}
            <td>{{ $hasil->jabatan }}</td>
            <td>
                <form action="{{ route('jabatan.destroy', $hasil->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('jabatan.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus {{ $hasil->jabatan }}?">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $jabatan->links() }}

@endsection
