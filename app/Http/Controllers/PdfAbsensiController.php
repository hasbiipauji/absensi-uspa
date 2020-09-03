<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Exports\NamaBulan;
use Illuminate\Support\Facades\Auth;
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

    public function createPDF_pilihan_user(Request $request)
    {
        $monthNames = NamaBulan::getNameMonths();
        $dari = $request->dari;
        $sampai = $request->sampai;
        $data = Absensi::where('user_id', Auth::user()->id)->whereBetween('created_at', [$dari, $sampai])->get();
        //share data to view
        view()->share('absensi', $data);
        view()->share('monthNames', $monthNames);
        $pdf = PDF::loadView('absensi.pdf', $data)->setPaper('A4', 'potrait');

        return $pdf->download('absensi.pdf');
    }

    public function createPDF_pilihan_admin(Request $request)
    {
        $monthNames = NamaBulan::getNameMonths();
        $dari = $request->dari;
        $sampai = $request->sampai;
        $data = Absensi::latest()->whereBetween('created_at', [$dari, $sampai])->get();
        //share data to view
        view()->share('absens', $data);
        view()->share('dari', $dari);
        view()->share('sampai', $sampai);
        view()->share('monthNames', $monthNames);
        $pdf = PDF::loadView('export.absen_all', $data)->setPaper('A4', 'potrait');

        return $pdf->download('absensi.pdf');
    }
}
