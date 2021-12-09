<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TambahUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tambah_user');
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
            'name'      =>'required',
            'email'     =>'required',
            'password'  =>'required',
            'telepon'   => 'required',
            'alamat'    => 'required',
            'foto'      => 'required',
        ]);
        
        // input data baru kedalam tabel user
        $input = new User();
        $input['name']              = $request->name;
        $input['email']             = $request->email;
        $input['password']          = Hash::make($request->password);
        $input['level']             = $request->level;
        $input['remember_token']    = Str::random(60);
        $input['alamat']            = $request->alamat;
        $input['telepon']           = $request->telepon;
        $image                      = $request->file('foto')->getClientOriginalName();
                                      $request->file('foto')->move('public/storage', $image);
        $input['foto']              = $image;
        if ($image){
            Storage::delete('public/storage'. $input->foto);
        }

        $input->save();

        return redirect('/daftar_user')->with('success', 'Task Created Successfully!');
    }
}
