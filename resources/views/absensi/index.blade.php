@extends('template_backend.master')
@section('sub-judul', 'Absensi hari ini')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<a href="{{ route('absensi.create') }}" class="btn btn-info btn-sm">Tambah absensi</a>
<br>
<br>
<div style="overflow-x: auto">
    <table class="table table-striped table-hover table-sm table-bordered"
        style="width: 100% ; max-width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Alamat</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Map location</th>
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
                    <td>
                        @php
                            $dateold = $hasil->created_at;
                            $datenew = explode(" ", $dateold);
                            echo($datenew[0]);
                        @endphp
                    </td>

                    {{-- menampilkan alamat --}}
                    <td>{{ $datenew[1] }}</td>

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

                    <td class=" float-right">
                        <form action="{{ route('absensi.destroy', $hasil->id) }}"
                            method="post">
                            @csrf
                            @method('delete')

                            @php

                                $d = strtotime($hasil->created_at);
                                $d = date("Y-m-d",$d);
                            @endphp

                            @if($d == date('Y-m-d') && $hasil->user_id == auth()->user()->id )
                                <a href="{{ route('absensi.edit', $hasil->id) }}"
                                    class="btn btn-primary btn-sm ">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm "
                                    onclick="return confirm('Yakin ingin menghapus {{ $hasil->absensi }}">Delete</button>
                            @endif


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
