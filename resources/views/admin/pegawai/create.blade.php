@extends('template_backend.master')
@section('sub-judul', 'tambah pegawai')

@section('content')

{{-- if dibawah untuk validasi data --}}
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger col-sm-4" role="alert">
        {{ $error }}
    </div>
    @endforeach
@endif

{{-- if dibawah untuk flash message --}}
@if (Session::has('success'))
    <div class="alert alert-success col-sm-4" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="" method="post">
@csrf


    <div class="form-group col-sm-4">
        <label>Nama Pegawai</label>
        <input type="text" class="form-control" name="nama_pegawai">
    </div>

    <div class="form-group col-sm-4">
        <label>Jabatan</label>
        <select class="form-control" name="jabatan_id"></select>
    </div>

    <div class="form-group col-sm-4">
        <button class="btn btn-primary btn-">Tambah Pegawai</button>
    </div>
</form>

@endsection

