<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\User;

class TambahKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ketua= User::where('level','ketua');
        // dd($ketua);
        return view('pimpinan.tambah_kelompok', compact('ketua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $pagename='Berhasil Menambah Data';
        // melalukan validasi
   
        $request->validate([
            'nama'=>'required',
            'alamat'=> 'required',
            'user_id'=> 'required',
        ]);

        //mengisi data baru 
        $tambah_kelompok= new Kelompok([
            'nama'=> $request->get('nama'),
            'alamat'=> $request->get('alamat'),
            'user_id'=> $request->get('user_id'),
        ]);
        
        // menyimpan data isian
        $tambah_kelompok->save();
        return view ('pimpinan.tambah_kelompok');
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
        //
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
        //
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
