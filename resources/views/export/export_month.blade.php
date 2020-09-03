@php
    use App\User;

@endphp

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
        <form action="{{ route('export_all_pilihan') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fromdate">Dari tanggal</label>
                    <input autocomplete="off" type="text" class="date form-control" name="dari" id="fromdate" required
                        placeholder="Dari tanggal">
                </div>
                <div class="form-group col-md-6">
                    <label for="todate">Sampai</label>
                    <input autocomplete="off" type="text" class="date form-control" name="sampai" id="todate" required
                        placeholder="Sampai">
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
                <th>No</th>
                <th>Nama</th>
                <th></th>
                @for($i = 0; $i < 32; $i++)
                    <th>{{ $i+1 }}</th>

                @endfor



            </tr>
        </thead>

        <tbody>



            @foreach($absensi as $key =>  $hasil)
                <tr>
                    {{-- ini untuk menampilkan nomor --}}

                    {{-- menampilkan nama dari model User --}}
                    <td>{{ $key+1 }}</td>


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
                           
                            foreach ($hasil as$keyi=> $value) {
                            $valuestat[$keyi] = $value->status;
                            $valuecreated[$keyi] = date('d',strtotime($value->created_at)) ;
                            }
                        
                            echo("<td id='".$value->id.$a."'> - </td>");
                         // <script>document.getElementById('".$a."').innerHTML ='".$valuestat[$x]."'</script>
                        
                            for ($x=0; $x < 32 ; $x++) { 
                                if (empty($valuestat[$x])==false) {
                                    if ($valuecreated[$x]==$a)
                                    { echo("<script>document.getElementById('".$value->id.$a."').innerHTML ='".$valuestat[$x]."'</script>");
                                    }else {
                                    }
                                }else {
    
                                    
                                    }
                                }
                            }
                                // if (empty($valuestat[$i])==false) {

                                // }else {
                                // echo("<td> ".$valuecreated[$i].$valuestat[$i]. "</td>");
                                // }

                    @endphp




                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- menampilkan pagination atau nomor halaman --}}


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
