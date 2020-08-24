@extends('template_backend.master')
@section('sub-judul', 'edit jabatan')

@section('content')

<!--Ini untuk form ada pop up harus diisi-->
@if (count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

<!-- Ini pop up data berhasil dikirimkan ke database -->
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
@endif

<form action="{{ route('jabatan.update', $jabatan->id) }}" method="post">
@csrf
@method('patch')
    <div class="form-group col-sm-4">
        <label>Jabatan</label>
        <input type="text" class="form-control" name="jabatan" value="{{ $jabatan->jabatan }}">
    </div>

    <div class="form-group col-sm-4">
        <button class="btn btn-primary btn-">Edit Jabatan</button>
    </div>
</form>

@endsection
