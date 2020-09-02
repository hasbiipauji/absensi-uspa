<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\jabatan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //ini untuk emenampilkan jumlah pegawai di dashboard
        $jumlah_pegawai = User::all()->count();
        $jumlah_jabatan = Jabatan::all()->count();
        return view('home', compact('jumlah_pegawai', 'jumlah_jabatan'));

    }
}
