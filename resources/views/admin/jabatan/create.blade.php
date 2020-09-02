@extends('template_backend.master')
@section('sub-judul', 'tambah jabatan')
@section('title', 'Tambah Jabatan')


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

<form action="{{ route('jabatan.store') }}" method="post">
@csrf
    <div class="form-group col-sm-4">
        <label>Jabatan</label>
        <input type="text" class="form-control" name="jabatan">
    </div>

    <div class="form-group col-sm-4">
        <button class="btn btn-primary btn-">Tambah Jabatan</button>
    </div>
</form>

@endsection
