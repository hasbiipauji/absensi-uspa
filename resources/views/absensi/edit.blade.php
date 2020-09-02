@extends('template_backend.master')
@section('sub-judul', 'Absensi')
@section('title', 'Edit Absensi')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<div class="section-body">
    <div class="card border-bottom">
      <div class="card-body">
          <div class=" text-lg text-center h3" id="date"></div>
          <div class=" text-lg text-center h2" id="time"></div>

      </div>
    </div>

    <hr style="border: 1px solid rgb(238, 238, 238);">
           <br>

    {{-- if dibawah untuk flash message --}}
    @if (Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
    @endif

    <form action="{{ route('absensi.update' , $absensi->user_id) }}" method="post">
        @csrf

        @method('patch')


        
          
          <div class=" col-sm-12 d-flex btn-group-toggle" data-toggle="buttons">
                <label onclick="handleClick(2);"  class=" m-auto btn btn-primary" id="label_absen_1">
                  <input  type="radio" name="status" id="option1" value="hadir" required> Hadir 
                </label>
                <label onclick="handleClick(3);"  class=" m-auto btn btn-success" id="label_absen_1">
                  <input  type="radio" name="status" id="option2" value="izin"> Izin
                </label>
                <label onclick="handleClick(4);"  class=" m-auto btn btn-warning" id="label_absen_1">
                  <input  type="radio" name="status" id="option3" value="sakit"> Sakit
            </label>

            </div>
            
            <div class=" mt-3 form-group col-sm-12" id="keterangan" style="display: none;">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $absensi->keterangan }}">
            </div>
            
            <div class="form-group d-flex mt-5">
                <button class="btn btn-primary btn m-auto " >Tambah absensi</button>
            </div>

            <hr style="border: 1px solid rgb(238, 238, 238);">
            <br>

            
            <div id="addressa">{{ $absensi->alamat }}</div>

            <div id="locationbtn"  class=" mb-3 d-flex btn-group-toggle"  data-toggle="buttons"> 
              <label onclick="handleMap();" class=" col-12 btn btn-primary m-auto " id="labellocation">Tambah Keterangan Lokasi  . 
              </label>
              <input type="hidden" id="lat" name="latitude" value="" >
              <input type="hidden" id="lon" name="longitude" value="" >
              <input type="hidden" id="alamat" name="alamat" value="" >
            </div>
            
            
            <div id="locationbtn"  class=" d-flex btn-group-toggle"  data-toggle="buttons">
              <label  class="btn btn-primary m-auto col-12" id="labellocation">Tambah Foto
              </label>
            </div>
              
              
          </div>
            
        </form>

  </div>

  
@endsection
