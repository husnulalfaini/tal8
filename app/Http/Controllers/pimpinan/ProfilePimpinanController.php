<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilePimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pimpinan.profile_pimpinan');
    }


    public function show()
    {
       $pimpinan=User::find(Auth()->user()->id);

       return view('pimpinan.profile_pimpinan', compact ('pimpinan'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name'      =>'required',
            'email'     => 'required',
            'telepon'   => 'required',
            'alamat'    => 'required',
        ]);

        $pimpinan=User::find(Auth()->user()->id);
            
            $pimpinan->name             = $request->name;
            $pimpinan->email            = $request->email;
            $pimpinan->password         = bcrypt($request->password);
            $pimpinan->telepon          = $request->telepon;
            $pimpinan->remember_token   = Str::random(60);
            $pimpinan->alamat           = $request->alamat;

            $image                      = $request->file('foto')->getClientOriginalName();
                                          $request->file('foto')->move('public/storage', $image);
            $pimpinan->foto             = $image;
            if($image){
                        Storage::delete('public/storage'. $pimpinan->foto);
                        }
            
            $pimpinan->save();
            
        return view ('pimpinan.profile_pimpinan')->with('sukses','tugas berhasil disimpan');
        
    }

}
