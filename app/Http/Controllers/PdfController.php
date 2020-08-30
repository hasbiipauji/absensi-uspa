<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\user;
use PDF;

class PdfController extends Controller
{
    public function showPdf()
    {
        $pegawai = User::all();
        return view('admin.pegawai.pdf', compact('pegawai'));
    }

    //generate pdf
    public function createPDF()
    {
        $data = User::all();

        //share data to view
        view()->share('pegawai', $data);
        $pdf = PDF::loadView('admin.pegawai.pdf', $data);

        //return $pdf->download('pegawai.pdf');
        return $pdf->stream();
    }
}
