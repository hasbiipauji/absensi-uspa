<?php

namespace App\Http\Controllers;

use App\Absensi;
use App\Pegawai;
use App\Jabatan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::paginate(10);
        return view('admin.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.pegawai.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $emailverify = date('Y-m-d');

        User::create([
            'name' => $request['name'],
            'email_verified_at' => $emailverify,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'jabatan' => $request['jabatan']
        ]);

        return redirect('/pegawai')->with('success', 'User baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $from = date('Y-m-d');
        $to = date('Y-m-d');
        $to = date('Y-m-d', strtotime("+1 day", strtotime($to)));
        // ->whereBetween('created_at', [$from, $to])

        $absensi = Absensi::where('user_id', $id)->latest()->paginate(10);


        return view('admin.pegawai.show', compact('absensi', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);

        $jabatan = Jabatan::paginate(10);

        return view('admin.pegawai.edit', compact('user', 'jabatan'));
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
            'jabatan' => 'required'
        ]);

        $user_data = [
            'name' => $request->name,
            'jabatan' => $request->jabatan
        ];

        User::whereId($id)->update($user_data);

        return redirect()->route('pegawai.index')->with('success', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
