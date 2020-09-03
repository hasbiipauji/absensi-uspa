@extends('template_backend.master')
@section('sub-judul', 'Report Absensi')
@section('title', 'Report Absensi')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<div class=" d-flex">
@if (auth()->user()->role=="admin")
<form action="{{ route('export.export_all_pilihan_excel') }}" method="post">
@else
<form action="{{ route('export.export_excel_pilihan') }}" method="post">
@endif
    @csrf
    <input type="hidden" id="lat" name="dari" value="{{ $dari }}">
    <input type="hidden" id="lat" name="sampai" value="{{ $sampai }}">

    {{-- <a href="/export/export_excel_pilihan" class="btn btn-info btn-sm">export excel</a> --}}
    <button type="submit" class="btn btn-primary">Export excel</button>
</form>


@if (auth()->user()->role=="admin")
<form action="{{ route('pdf-absensi_pilihan_admin') }}" method="post">
@else
<form action="{{ route('pdf-absensi_pilihan_user') }}" method="post">
@endif
    @csrf
    <input type="hidden" id="lat" name="dari" value="{{ $dari }}">
    <input type="hidden" id="lat" name="sampai" value="{{ $sampai }}">

    {{-- <a href="/export/export_excel_pilihan" class="btn btn-info btn-sm">export excel</a> --}}
    <button type="submit" class="btn btn-danger">Export PDF</button>
</form>
</div>

<br>
<br>
<div style="overflow-x: auto">
    <table class="table table-striped table-hover table-sm table-bordered"
        style="width: 100% ; max-width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>No </th>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Tanggal absensi</th>
                <th>Waktu</th>
                <th>Alamat</th>
                <th>Lokasi map</th>
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

                            echo(date('d',strtotime($datenew[0]))." ");
                            echo($monthNames[date('m',strtotime($datenew[0]))]);
                            echo(" ".date('Y',strtotime($datenew[0])));

                        @endphp
                    </td>

                    {{-- menampilkan waktu --}}
                    <td>{{date('H:i',strtotime($datenew[1])) }}</td>

                    {{-- menampilkan alamat --}}
                    <td>{{ $hasil->alamat }}</td>

                    {{-- menampilkan map --}}
                    @if($hasil->latitude==true)
                        <td><a href="/location/{{ $hasil->id }}">lihat lokasi</a></td>
                    @else
                        <td></td>
                    @endif



                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- menampilkan pagination atau nomor halaman --}}
{{-- {{ $absensi->links() }} --}}

@endsection
