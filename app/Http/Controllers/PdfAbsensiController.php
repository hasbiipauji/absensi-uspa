<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Exports\NamaBulan;
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
        $monthNames = NamaBulan::getNameMonths();
        $data = Absensi::all();
        //share data to view
        view()->share('absensi', $data);
        view()->share('monthNames', $monthNames);
        $pdf = PDF::loadView('absensi.pdf', $data)->setPaper('A4', 'potrait');

        return $pdf->stream();
    }

    public function createPDF_hari_ini()
    {
        $monthNames = NamaBulan::getNameMonths();
        $dari = date('Y-m-d');
        $sampai = date('Y-m-d', strtotime("+1 day", strtotime($dari)));
        $data = Absensi::whereBetween('created_at', [$dari, $sampai])->get();

        //share data to view
        view()->share('absensi', $data);
        view()->share('monthNames', $monthNames);
        $pdf = PDF::loadView('absensi.pdf', $data)->setPaper('A4', 'potrait');

        return $pdf->stream();
    }
}
