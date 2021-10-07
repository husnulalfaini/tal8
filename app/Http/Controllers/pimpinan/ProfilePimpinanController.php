<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show()
    {
       $pimpinan=User::find(Auth()->user()->id);
    //    dd($ketua);
       return view('pimpinan.profile_pimpinan', compact ('pimpinan'));
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
        $pimpinan=User::find(Auth()->user()->id);
          
      
            // $ketua->name= $request->get('name');
            // $ketua->email= $request->get('email');
            // $ketua->password= $request->get('password');
            // $ketua->telepon= $request->get('telepon');
            // $ketua->alamat= $request->get('alamat');
            
            $pimpinan->name= $request->name;
            $pimpinan->email= $request->email;
            $pimpinan->password= bcrypt($request->password);
            $pimpinan->telepon= $request->telepon;
            $pimpinan->alamat= $request->alamat;

            $image = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('public/storage', $image);
            $pimpinan->foto        = $image;
            if($image){
                        Storage::delete('public/storage'. $pimpinan->foto);
                        }
            
            $pimpinan->save();
        return view ('pimpinan.profile_pimpinan')->with('sukses','tugas berhasil disimpan');
        
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
