<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            $dataPengguna = Pengguna::all();
            return view ('Pengguna.data', compact('dataPengguna'));
            
        } else {
            $user = auth()->user();
            $dtKeluhan = Keluhan::where('id_pengguna', $user->id);
            return view ('Keluhan.dataKeluhan1', compact('dtKeluhan'));    
        }

        
        // return view ('Pengguna.data', compact('dataPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'alamat' => $request->alamat
        ]);

        return redirect('data')->with('success', 'Task Created Successfully!');
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
        $pengguna = Pengguna::findorfail($id);
        return view ('Pengguna.edit', compact('pengguna'));
        //return view ('pengguna.edit',[ 'data'=>pengguna::findorfail($id),]);
        
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
        $pengguna = Pengguna::findorfail($id);
        $pengguna->update($request->all());
        return redirect('data')->with('toast_success', 'Task Updated Successfully!');
        //return redirect ()->route('pengguna.data')->with('toast_success', 'Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::findorfail($id);
        $pengguna->delete();
        return back()->with('info', 'Task Deleted Successfully!');
    }
}
