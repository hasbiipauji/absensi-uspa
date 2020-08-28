<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = Absensi::latest()->paginate(10);
        return view('absensi.index', compact('absensi'));
        // return redirect('absensi/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_absen_status = auth()->user()->absensis()->whereDate('created_at', date('Y-m-d'))->get();
        $uid = auth()->user()->id;
        $usercurdate = $user_absen_status->pluck('user_id')->get(0);
          
        
        if ($usercurdate==$uid) {
            // dd($usercurdate, $user_absen_status , $uid , $usercurdate==$uid);     
            return redirect('absensi');
        } else {
            return view('absensi.create');
        
        }
        

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);

        auth()->user()->absensis()->create($request->all());
        

        return redirect('/absensi')->with('success', 'Absensi berhasil');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = Absensi::findorfail($id);

        return view('absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'absensi' => 'required'
        ]);

        $absensi_data =[
            'absensi' => $request->absensi
        ];

        Absensi::whereId($id)->update($absensi_data);

        return redirect()->route('absensi.index')->with('success', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absensi = Absensi::findorfail($id);
        $absensi->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}

