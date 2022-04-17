<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;

class KeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtKeluhan = Keluhan::all();
        //dd($dtKeluhan);
        return view ('Keluhan.dataKeluhan', compact('dtKeluhan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Keluhan.createKeluhan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Keluhan::create([
            'nama' => $request->nama,
            'nama_keluhan' => $request->nama_keluhan,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status
        ]);

        return redirect('dataKeluhan')->with('success', 'Task Created Successfully!');
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
        $keluhan = Keluhan::findorfail($id);
        return view ('Keluhan.editKeluhan', compact('keluhan'));
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
        $keluhan = Keluhan::findorfail($id);
        $keluhan->update($request->all());
        return redirect('dataKeluhan')->with('toast_success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluhan = Keluhan::findorfail($id);
        $keluhan->delete();
        return back()->with('info', 'Task Deleted Successfully!');
    }
}
