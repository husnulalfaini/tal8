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
        //
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
        $request->validate([
            'name'=>'required',
            'email'=> 'required',
            'telepon'=> 'required',
            'alamat'=> 'required',
        ]);
        $admin=User::find(Auth()->user()->id);
            
            $admin->name= $request->name;
            $admin->email= $request->email;
            $admin->password= bcrypt($request->password);
            $admin->telepon= $request->telepon;
            $admin->remember_token = Str::random(60);
            $admin->alamat= $request->alamat;

            $image = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('public/storage', $image);
            $admin->foto        = $image;
            if($image){
                        Storage::delete('public/storage'. $admin->foto);
                        }
            
            $admin->save();
        return view ('admin.profile_admin')->with('sukses','Data Admin Berhasil di Update');
        
    
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
