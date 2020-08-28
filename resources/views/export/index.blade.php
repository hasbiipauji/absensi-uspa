@extends('template_backend.master')
@section('sub-judul', 'absensi')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<a href="/export/export_excel" class="btn btn-info btn-sm">export excel</a>
<br>
<br>
<div style="overflow-x: auto">
    <table class="table table-striped table-hover table-sm table-bordered"
        style="width: 100% ; max-width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>status</th>
                <th>keterangan</th>
                <th>tanggal absensi</th>
                <th>alamat</th>
                <th>longitude</th>
                <th>latitude</th>
                <th>map location</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($absensi as $result => $hasil)
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

                    {{-- menampilkan map --}}
                    @if($hasil->latitude==true)
                        <td><a href="/location/{{ $hasil->id }}">lihat lokasi</a></td>
                    @else
                        <td></td>
                    @endif

                    <td>
                        <form action="{{ route('absensi.destroy', $hasil->id) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('absensi.edit', $hasil->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus {{ $hasil->absensi }}">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- menampilkan pagination atau nomor halaman --}}
{{ $absensi->links() }}

@endsection