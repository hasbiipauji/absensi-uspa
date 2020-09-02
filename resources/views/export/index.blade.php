@extends('template_backend.master')
@section('sub-judul', 'Report')
@section('title', 'Report')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<style>
    .firstDiv,
    .secondDiv {
        position: absolute;
    }

    .form-popup {
        display: none;
        position: block;
        bottom: 0;
        right: 15px;
        z-index: 9;
    }

</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class='pb-1 '>

    <a id="exportraw" href="/export/export_excel" class="btn btn-info mr-2 ">export semua excel</a>
    <button onclick="closeForm()" type="button" class="btn btn-red firstDiv ">Tutup</button>
    <button onclick="openForm()" id="openb" type="button" class="btn btn-primary secondDiv ">Pilih jangka waktu</button>

</div>


<div>

    <div class="form-popup mt-5" id="myForm">
        <form action="{{ route('export.pilihan') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fromdate">Dari tanggal</label>
                    <input autocomplete="off" type="text" class="date form-control" name="dari" id="fromdate" required placeholder="Dari tanggal">
                </div>
                <div class="form-group col-md-6">
                    <label for="todate">Sampai</label>
                    <input autocomplete="off" type="text" class="date form-control" name="sampai" id="todate" required placeholder="Sampai">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Export excel</button>
        </form>
    </div>

</div>


<br>
<br>
<div style="overflow-x: auto">
    <table class="table table-striped table-hover table-sm table-bordered"
        style="width: 100% ; max-width:100%; white-space:nowrap;">
        <thead>
            <tr>
                <th>Nomor</th>
                <th>nama</th>
                <th>status</th>
                <th>keterangan</th>
                <th>tanggal absensi</th>
                <th>alamat absensi</th>
                {{-- <th>longitude</th>
                <th>latitude</th> --}}
                <th>map location</th>
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

                    {{-- menampilkan longitude
                    <td>{{ $hasil->longitude }}</td>

                    menampilkan latitude
                    <td>{{ $hasil->latitude }}</td> --}}

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
{{ $absensi->links() }}

<script type="text/javascript">
    $('.date').datepicker({

        format: 'yyyy-mm-dd'

    });

    function openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("openb").style.display = "none";
        document.getElementById("exportraw").style.display = "none";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("openb").style.display = "";
        document.getElementById("exportraw").style.display = "";
    }

</script>
@endsection
