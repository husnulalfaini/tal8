<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Str;

class TambahKelompokController extends Controller
{

    public function tampilKelompok()
    {
        // $kelompok= Kelompok::first();
        return view('pimpinan.tambah_kelompok');
    }


    public function tambahKelompok(Request $request)
    {
        $image   = $request->file('foto')->getClientOriginalName();
                   $request->file('foto')->move('public/storage', $image);

        // validasi register
        $validator = Validator::make($request->all(), [
            'email'         =>'required|unique:users',
            'alamat'        => 'required',
            'kecamatan'     => 'required|unique:kelompoks'
        ]);

        //pengondisian error
        if ($validator->fails()) {
            return redirect('/tambah_ketua')->with('error', 'kelompok sudah ada, pilih kelompok lain!');               
        }

        //mengisi data baru 
        $tambah_kelompok= Kelompok::create([
            'nama'      => $request->get('nama'),
            'alamat'    => $request->get('alamat'),
            'kecamatan' => $request->get('kecamatan'),
            'longitude' => $request->get('longitude'),
            'latitude'  => $request->get('latitude'),
        ]);

        $tambah_ketua= User::create([
            'name'              => $request->get('name'),
            'email'             => $request->get('email'),
            'password'          => Hash::make($request->password),
            'level'             => 'ketua',
            'remember_token'    => Str::random(60),
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'kelompok_id'       => $tambah_kelompok->id,
            'foto'              => $image,
        ]);

            return redirect('/daftar_kelompok')->with('success', 'Kelompok baru berhasil ditambahkan!');
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
        
        $kelompok=Kelompok::find($id);
        $ketua= User::where('kelompok_id', $id)->get();
        // dd($ketua);

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
       
        $kelompok=Kelompok::find($id);
        $ketua= User::where('kelompok_id', $id)->where('level','ketua')->first();
        $kelompok->nama     = $request->nama;
        $kelompok->alamat  = $request->alamat;
            $kelompok->kecamatan  = $request->kecamatan;
            $kelompok->longitude  = $request->longitude;
            $kelompok->latitude  = $request->latitude;
            
            $ketua->name            = $request->name;
            $ketua->email           = $request->email;
            $ketua->password        = Hash::make($request->password);
            $ketua->remember_token  = Str::random(60);
            $ketua->alamat          = $request->alamat;
            $ketua->telepon         = $request->telepon;
            $kelompok->save();
            $ketua->save();
            //   dd($ketua);
        return redirect()->route('daftar_kelompok')->with('success', 'data baru berhasil diubah!');
        
    }

 
}
