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
       $ketua=User::find(Auth()->user()->id);
    //    dd($ketua);
       return view('ketua.profile_ketua', compact ('ketua'));
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
        $ketua=User::find(Auth()->user()->id);
          
      
            // $ketua->name= $request->get('name');
            // $ketua->email= $request->get('email');
            // $ketua->password= $request->get('password');
            // $ketua->telepon= $request->get('telepon');
            // $ketua->alamat= $request->get('alamat');
            
            $ketua->name= $request->name;
            $ketua->email= $request->email;
            $ketua->password= bcrypt($request->password);
            $ketua->telepon= $request->telepon;
            $ketua->alamat= $request->alamat;

            $image = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('public/storage', $image);
            $ketua->foto        = $image;
            if($image){
                        Storage::delete('public/storage'. $ketua->foto);
                        }
            
            $ketua->save();
        return view ('ketua.profile_ketua')->with('sukses','tugas berhasil disimpan');
        
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
