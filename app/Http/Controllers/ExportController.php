<?php

namespace App\Http\Controllers;

use App\Absensi;
use Illuminate\Http\Request;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\User;

class ExportController extends Controller
{
    public function index()
    {

        $absensi = Absensi::where('user_id', auth()->user()->id)->latest()->paginate(10);
        $user = User::all();


        return view('export.index', ['absensi' => $absensi]);
    }


    public function export_excel()
    {

        // return Excel::download(new AbsensiExport, 'Absen.xlsx');	
        return (new AbsensiExport)->download('invoices.xlsx');
    }


    public function pilihan(Request $request)
    {

        $dari = $request->dari;
        $sampai = $request->sampai;
        // $from = date('2020-08-27');
        // $to = date('2020-08-28');
        $sampai = date('Y-m-d', strtotime("+1 day", strtotime($sampai)));
        $ab = Absensi::where('user_id', auth()->user()->id)->whereBetween('created_at', [$dari, $sampai])->get();
        return view('export.pickeddate', ['absensi' => $ab, 'dari' => $dari, 'sampai' => $sampai]);
    }

    public function export_excel_pilihan(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        // dd($dari);
        return (new AbsensiExport)->simpanDari($dari)->simpanSampai($sampai)->download('invoices.xlsx');
    }
}
