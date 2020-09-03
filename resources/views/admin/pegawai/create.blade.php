@extends('template_backend.master')
@section('sub-judul', 'tambah pegawai')
@section('title', 'Tambah pegawai')


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



<form method="POST" action="{{ route('pegawai.store') }}">
    @csrf

    <div class="">
        
        <div class="form-group col-sm-4">
            <label for="name" >{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="">
        
        <div class="form-group col-sm-4">
            <label for="email" >{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="">
        
        <div class="form-group col-sm-4">
            <label for="password" >{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="">
        
        <div class="form-group col-sm-4">
            <label for="jabatan" >jabatan</label>
            <select class="form-control"  name="jabatan" id="jabatan">
                <option value="">-- Pilih Jabatan --</option>
                @foreach ($jabatan as $itemjabatan)
                <option value="{{ $itemjabatan->jabatan }}">{{ $itemjabatan->jabatan }}</option>
                @endforeach
            </select>
            

            @error('jabatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

   

    <div class=" mb-0">
        <div class="form-group col-sm-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
    <br>
    <br>
  
</form>

@endsection
