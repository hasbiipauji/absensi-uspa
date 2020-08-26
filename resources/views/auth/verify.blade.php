@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header d-flex align-items-lg-center justify-content-between">
                    <div>
                        Silahkan cek email anda
                    </div>
                    <div>
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <div class="card-body">
                    {{ __('Sebelum melanjutkan, periksa email anda untuk verifikasi.') }}
                    {{ __('Jika anda belum menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini') }}</button>.

                    </form>
                    <br>


                </div>
                <div>
                    <a href="{{ route('home') }}" style="float: right"><button type="button" class="btn btn-primary">Halaman Utama</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
