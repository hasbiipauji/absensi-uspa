<?php

namespace App\Http\Controllers;

use App\Absensi;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function show($id)
    {
        $idabsen = Absensi::find($id);

        return view('location' ,compact('idabsen'));

    }
}
