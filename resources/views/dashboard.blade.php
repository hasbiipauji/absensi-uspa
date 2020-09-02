@extends('template_backend.master')
@section('sub-judul', 'Dashboard')
@section('title', 'Dashboard')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card ">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Absensi kehadiran hari ini</h4>            
                <div style="overflow-x: auto ; background-color: white">
                    <div class=" mb-5">
                        <a class="btn btn-primary" style="float: right" href="{{ route('pdf-absensi_hari_ini') }}">Export to PDF</a>
                        <a class="btn btn-success mr-2" style="float: right" href="{{ route('export.export_excel_hari_ini') }}">Export to excel</a>
                    </div>
                    
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
                                            echo($datenew[0]);
                                        @endphp
                                    </td>

                                    {{-- menampilkan alamat --}}
                                    <td>{{ $datenew[1] }}</td>

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
                    {{-- menampilkan pagination atau nomor halaman --}}
{{ $absensi->links() }}

                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
</div>




@endsection
