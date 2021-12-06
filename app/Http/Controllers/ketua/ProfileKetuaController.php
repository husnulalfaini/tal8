<?php

namespace App\Http\Controllers\ketua;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ketua.profile_ketua');
    }


    public function show()
    {
       $ketua=User::find(Auth()->user()->id);
    //    dd($ketua);
       return view('ketua.profile_ketua', compact ('ketua'));
    }

   
    public function update(Request $request, $id)
    {
        // validasi update
        $request->validate([
            'name'      =>'required',
            'email'     => 'required',
            'telepon'   => 'required',
            'alamat'    => 'required',
        ]);

        // menemukan data user sesuai authentifikasi yang ada
        $ketua=User::find(Auth()->user()->id);
            
            $ketua->name            = $request->name;
            $ketua->email           = $request->email;
            $ketua->password        = bcrypt($request->password);
            $admin->remember_token  = Str::random(60);
            $ketua->telepon         = $request->telepon;
            $ketua->alamat          = $request->alamat;
            $image                  = $request->file('foto')->getClientOriginalName();
                                      $request->file('foto')->move('public/storage', $image);
            $ketua->foto            = $image;
            if($image){
                Storage::delete('public/storage'. $ketua->foto);
            }

            $ketua->save();

        return view ('ketua.profile_ketua')->with('sukses','tugas berhasil disimpan');
        
    }
}
