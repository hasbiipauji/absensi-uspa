<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>



    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    {{-- toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                                <i class="fas fa-bars"></i>
                            </a>
                        </li>
                    </ul>

                </form>
                <div class=" d-block text-white">Hi, {{ Auth::user()->name }} </div></a>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="dropdown-menu dropanim dropdown-menu-right">
                                <a href="#" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item has-icon text-danger mt-2"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out-alt"></i>
                                    {{ __('Logout') }}

                                </a>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>


            @include('template_backend.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('sub-judul')</h1>
                    </div>

                    <div class="section-body">
                        <div class="card text-white bg-primary">
                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                            {{-- <div class="card-body">
                <h4 class="card-title">{{ ucfirst(auth()->user()->name) }}</h4>
                            <p class="card-text">jabatan</p>
                        </div> --}}
                    </div>

                    {{-- <div class="card ">
              <div class="card-body">

                  <div class=" text-lg text-center h2" id="date"></div>
                  <div class=" text-lg text-center h1" id="time"></div>

              </div>
            </div>

            <div class="card text-left text-white bg-primary">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title text-center">Anda belum mengisi kehadiran hari ini </h4>
                <p class="card-text text-center">silahkan isi kehadiran disini   </p>
              </div>
            </div> --}}

            </div>

            @yield('content')
            <div class="section-body">
            </div>
            </section>
        </div>


        @include('template_backend.footer')
