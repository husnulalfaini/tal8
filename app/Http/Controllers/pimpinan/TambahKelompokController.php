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
        $ketua= User::where('level','ketua')->get();
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
        $kelompok = Kelompok::all();
        $ketua= User::where('level','ketua')->get();
        $pagename='Berhasil Menambah Data';
        // melalukan validasi
   
        $request->validate([
            'nama'=>'required',
            'alamat'=> 'required',
        ]);

        //mengisi data baru 
        $tambah_kelompok= new Kelompok([
            'nama'=> $request->get('nama'),
            'alamat'=> $request->get('alamat'),
        ]);
        
        // menyimpan data isian
        $tambah_kelompok->save();
        return view ('pimpinan.daftar_kelompok', compact('kelompok','ketua'));
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
        $ketua= User::where('level','ketua')->get();
        $kelompok=Kelompok::find($id);

        return view('pimpinan.edit_kelompok',compact('kelompok','ketua'));


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
       
        $kelompok=Kelompok::all();
        $kelompok=Kelompok::find($id);
          
            $kelompok->nama= $request->nama;
            $kelompok->user_id= $request->user_id;
            $kelompok->save();
        // return redirect ('pimpinan.daftar_kelompok');
        return redirect()->route('daftar_kelompok');
        
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
