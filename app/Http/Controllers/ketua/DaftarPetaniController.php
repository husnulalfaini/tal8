<?php

namespace App\Http\Controllers\ketua;

use App\Models\Petani;
use App\Models\Panen;
use App\Models\Lahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarPetaniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_petani= Petani::all();
        return view('ketua.daftar_petani', compact('daftar_petani'));
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
       $petani = Petani::find($id);
       $panen_petani = Panen::where('petani_id', $id)->get();

       $luas_lahan = Lahan::where('petani_id', $id)->sum('luas_lahan');
       $jumlah_lahan = Lahan::where('petani_id', $id)->count();
        
       $panen_katak = Panen::where('petani_id', $id)->sum('panen_katak');
       $panen_umbi = Panen::where('petani_id', $id)->sum('panen_umbi');
       $total_panen = $panen_katak + $panen_umbi;
    //    dd($total_panen);

        return view('ketua.monitoring_petani', compact('petani','panen_petani','total_panen','luas_lahan','jumlah_lahan'));

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
