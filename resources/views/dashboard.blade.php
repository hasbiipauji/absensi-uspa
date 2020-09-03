@php
    use App\User;
@endphp
@extends('template_backend.master')

@section('sub-judul', 'Dashboard')
@section('title', 'Dashboard')


@section('content')

@if(Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<div class=" d-flex " style="overflow-x: auto ;">
    <div class="col-lg-3 col-md-3 col-sm-3 col-10 d-block">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pegawai</h4>
                </div>
                <div class="card-body">
                    {{ $jumlah_pegawai ?? '' }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-10 d-block">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jabatan</h4>
                </div>
                <div class="card-body">
                    {{ $jumlah_jabatan ?? '' }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-10 d-block">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Reports</h4>
                </div>
                <div class="card-body">
                    -
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-10 d-block">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Absen Hari ini</h4>
                </div>
                <div class="card-body">
                    -
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

  
    <div class="col-12">
        <div class="card ">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Absensi hari ini</h4>            
                
                @if (auth()->user()->role=="admin")
                    
                <div class=" d-flex mb-1">
                    <a class="btn btn-primary"  href="{{ route('pdf-absensi_hari_ini') }}">Export to PDF</a>
                    <a class="btn btn-success mr-2"  href="{{ route('export.export_excel_hari_ini') }}">Export to excel</a>
                </div>
                @endif
                <div style="overflow-x: auto ; background-color: white">
                    
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
                            @if (isset($absensi) )
                                
                            
                            @foreach($absensi  as $result => $hasil)
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

                            @endif
                        </tbody>
                    </table>
                    {{-- menampilkan pagination atau nomor halaman --}}
                    @if (isset($absensi))
                        
                    {{ $absensi->links() }}
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">Absensi bulan ini</h4>
                    
                <div style="overflow-x: auto">
                    <table class="table table-striped table-hover table-sm table-bordered"
                        style="width: 100% ; max-width:100%; white-space:nowrap;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th></th>
                                @for($i = 0; $i < 32; $i++)
                                    <th>{{ $i+1 }}</th>
                                @endfor
                            </tr>
                        </thead>

                        <tbody>
                            @if (isset($absensi))
                        
                            @foreach($absensi_tabel as $key =>  $hasil)
                                <tr>
                                    {{-- ini untuk menampilkan nomor --}}
                                    <td>{{ $key+1 }}</td>
                                                                        
                                    {{-- menampilkan nama dari model User --}}
                                    <td>
                                        @php
                                            $names = [""];
                                            foreach ($hasil as $key => $value) {
                                            $names[0] = $value->user->name;
                                            }
                                            echo($names[0]);
                                        @endphp
                                    </td>
                                    <td></td>

                                    @php
                                        for ($i=0; $i <32 ; $i++) {
                                            $valuestat=[""]; 
                                            $valuecreated=[""]; 
                                            $a=$i+1; 
                                        
                                            foreach ($hasil as $keyi => $value) 
                                            {
                                                $valuestat[$keyi] = $value->status;
                                                $valuecreated[$keyi] = date('d',strtotime($value->created_at)) ;
                                            }
                                        
                                            echo("<td id='".$value->id.$a."'> - </td>");
                                        
                                            for ($x=0; $x < 32 ; $x++) 
                                            { 
                                                if (empty($valuestat[$x])==false) 
                                                {
                                                    if ($valuecreated[$x]==$a)
                                                    { echo("<script>document.getElementById('".$value->id.$a."').innerHTML ='".$valuestat[$x]."'</script>");
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                </tr>
                            @endforeach
                            
                            
                            @endif
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>
</div>





@endsection
