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
        $absensi = Absensi::latest()->paginate(10);
        $user = User::all();

		return view('export.index',['absensi'=>$absensi]);
	}
 
	public function export_excel()
	{
        
// return Excel::download(new AbsensiExport, 'Absen.xlsx');	
return (new AbsensiExport)->forYear(26)->download('invoices.xlsx');

}
}
