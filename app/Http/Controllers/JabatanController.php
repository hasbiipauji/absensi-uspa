<?php

namespace App\Http\Controllers;

use App\Jabatan; //ini model harus di include kan
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::paginate(10);
        return view('admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
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
            'jabatan' => 'required|min:3'
        ]);

        $jabatan = Jabatan::create($request->all()); //ini dari name file create jabatan

        return redirect()->back()->with('success', 'data berhasil disimpan');
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
        $jabatan = Jabatan::findorfail($id);

        return view('admin.jabatan.edit', compact('jabatan'));
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

        $jabatan_data =[
            'jabatan' => $request->jabatan
        ];

        Jabatan::whereId($id)->update($jabatan_data);

        return redirect()->route('jabatan.index')->with('success', 'data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = jabatan::findorfail($id);
        $jabatan->delete();

        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
