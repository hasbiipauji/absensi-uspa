<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use PDF;

class PdfAbsensiController extends Controller
{
    public function showPdf()
    {
        $absensi = Absensi::all();
        return view('absensi.pdf', compact('absensi'));
    }

    //generate pdf
    public function createPDF()
    {
        $data = Absensi::all();

        //share data to view
        view()->share('absensi', $data);
        $pdf = PDF::loadView('absensi.pdf', $data);

        return $pdf->download('pdf_file.pdf');
    }
}
