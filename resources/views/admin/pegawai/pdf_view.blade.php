@extends('template_backend.master')
@section('sub-judul', 'Print PDF')

@section('content')

<div class="d-flex justify-content-end mb-4">
    <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a>
</div>

<table class="table table-striped table-hover table-sm table-bordered">
    <thead class="thead-dark">
        <tr>
            {{-- <th>No</th> --}}
            <th>Nama Pegawai</th>
            <th>email</th>
            <th>jabatan</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pegawai as $data)
        <tr>
            {{-- ini untuk menampilkan nomor --}}
            {{-- <td>{{ $data + $pegawai->firstitem() }}</td> --}}
            {{-- end --}}

            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->jabatan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{ $pegawai->links() }} --}}

@endsection
