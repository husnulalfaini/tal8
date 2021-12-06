<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TambahKelompokController extends Controller
{
    
    public function tambahKelompok(Request $request)
    {
        $ketua= User::where('level','ketua')->get();
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

        return redirect('/daftar_kelompok')->with('success', 'Task Created Successfully!');
    }


    public function tambahKetua(Request $request)
    {
        $ketua= User::where('level','ketua')->get();

        $kelompok = Kelompok::all();

        // melalukan validasi
        $request->validate([
            'name'      =>'required',
            'email'     =>'required',
            'password'  =>'required',
            'telepon'   =>'required',
            'alamat'    =>'required',
            'foto'      =>'required',
        ]);

        $input                      = new User();
        $input['name']              = $request->name;
        $input['email']             = $request->email;
        $input['password']          = Hash::make($request->password);
        $input['level']             = 'ketua';
        $input['remember_token']    = Str::random(60);
        $input['alamat']            = $request->alamat;
        $input['telepon']           = $request->telepon;
        $input['kelompok_id']       = $request->kelompok_id;
        $image                      = $request->file('foto')->getClientOriginalName();
                                      $request->file('foto')->move('public/storage', $image);
        $input['foto']              = $image;
        if($image){
                    Storage::delete('public/storage'. $input->foto);
                    }
        $input->save();
        
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
          
            $kelompok->nama     = $request->nama;
            $kelompok->user_id  = $request->user_id;
            $kelompok->save();

        return redirect()->route('daftar_kelompok');
        
    }

 
}
