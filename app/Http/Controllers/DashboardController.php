<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Exports\NamaBulan;
use App\Jabatan;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $monthNames = NamaBulan::getNameMonths();
        $dataUserVar = User::all();
        $arrUser = [];
        $absensi_tabel = [];
        $dariBulanini = date('Y-m');
        $dariBulanini = date('Y-m-d', strtotime("-1 month", strtotime($dariBulanini)));
        $dariBulanini = date('Y-m-d', strtotime("+1 month", strtotime($dariBulanini)));
        $SampaiBulanini = date('Y-m-d', strtotime("+1 month", strtotime($dariBulanini)));


        foreach ($dataUserVar as $key => $value) {
            $arrUser[$key] = $value->id;
            $absensi_tabel[$key] = Absensi::where('user_id', $value->id)->latest()->whereBetween('created_at', [$dariBulanini, $SampaiBulanini])->get();
        }

        //ini untuk emenampilkan jumlah pegawai di dashboard
        $jumlah_pegawai = User::all()->count();
        $jumlah_jabatan = Jabatan::all()->count();

        $from = date('Y-m-d');
        $to = date('Y-m-d');
        $to = date('Y-m-d', strtotime("+1 day", strtotime($to)));
        $absensi = Absensi::latest()->whereBetween('created_at', [$from, $to])->paginate(5);

        return view('dashboard', compact('absensi', 'jumlah_pegawai', 'jumlah_jabatan', 'absensi_tabel', 'monthNames'));
    }
}
