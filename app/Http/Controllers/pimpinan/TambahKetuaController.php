<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TambahKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pimpinan.tambah_ketua');
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
        // melalukan validasi
   
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'telepon'=> 'required',
            'alamat'=> 'required',
            'foto'=> 'required',
        ]);

        $input = new User();
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = Hash::make($request->password);
        $input['level'] = 'ketua';
        $input['remember_token'] = Str::random(60);
        $input['alamat'] = $request->alamat;
        $input['telepon'] = $request->telepon;
        $image = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move('public/storage', $image);
        $input['foto']        = $image;
        if($image){
                    Storage::delete('public/storage'. $input->foto);
                    }
        $input->save();

        // $pagename='Berhasil Menambah Data';
        

        // $image = $request->file('foto')->getClientOriginalName();
        // $request->file('foto')->move('public/storage', $image);

        // //mengisi data baru 
        // $tambah_ketua= new User([
        //     'name'=>$request->name,
        //     'level'=> $request->level,
        //     'email'=> $request->email,
        //     'password'=> bcrypt($request->password),
        //      Str::random(60) =>$request->remember_token,
        //     'alamat'=>  $request->alamat,
        //     'telepon'=>$request->telepon,
        //     'foto'=> $request-> $image,
            
        // ]);
        
        // menyimpan data isian
        // $tambah_ketua->save();
        // dd($tambah_ketua);
        return view ('pimpinan.tambah_ketua');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
