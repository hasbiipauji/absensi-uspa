<?php

namespace App\Http\Controllers;

use App\Absensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $from = date('Y-m-d');
        $to = date('Y-m-d');
        $to = date('Y-m-d', strtotime("+1 day", strtotime($to)));
        $absensi = Absensi::latest()->whereBetween('created_at', [$from, $to])->paginate(5);

        return view('dashboard', compact('absensi'));
    }
}
