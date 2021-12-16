<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile_admin');
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
        // validase inputan
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'telepon'=> 'required',
            'alamat'=> 'required',
        ]);

        //  mencari user sesuai authentikasi user yang ada
        $admin=User::find(Auth()->user()->id);
            
            // input data update user yang baru
            $admin->name            = $request->name;
            $admin->email           = $request->email;
            $admin->password        = bcrypt($request->password);
            $admin->telepon         = $request->telepon;
            $admin->remember_token  = Str::random(60);
            $admin->alamat          = $request->alamat;
            $admin->save();

            return redirect()->route('profile_admin')->with('success','Data Admin Berhasil di Update');
    }

    
    public function updateFoto(Request $request, $id)
    {
        //  mencari user sesuai authentikasi user yang ada
        $admin=User::find(Auth()->user()->id);

            // input data foto
            $image                  = $request->file('foto')->getClientOriginalName();
                                      $request->file('foto')->move('public/storage', $image);
            $admin->foto  =           $image;
            
            if($image){
                Storage::delete('public/storage'. $admin->foto);
                }

            $admin->save();

            return redirect()->route('profile_admin')->with('success','Data Admin Berhasil di Update');
    }

}
