<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;

class DaftarKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompok = Kelompok::all();
        return view('pimpinan.daftar_kelompok', compact('kelompok'));
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
        
    //    $petani = Petani::find($id);

    //    //    menampilkan data panen petani
    //       $panen_petani = Panen::select(DB::raw('*'))
    //       ->join('lahans','lahans.id','=','panens.lahan_id')
    //       ->join('petanis','petanis.id','=','lahans.petani_id')
    //       ->where('lahans.petani_id', $id)
    //       ->get();
       
    //    //    menjumlah luas lahan
    //    $luas_lahan = Lahan::where('petani_id', $id)->sum('luas_lahan');
   
    //       //    menjumlah lahan
    //       $jumlah_lahan = Lahan::where('petani_id', $id)->count();
   
    //       //menampilkan data lahan sesuai yang dimiliki petani
    //       $lahan = Lahan::where('petani_id', $id)->get();
          
          
    //        // menghitung total panen petani
    //       $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
    //        ->join('lahans','lahans.id','=','panens.lahan_id')
    //        ->join('petanis','petanis.id','=','lahans.petani_id')
    //        ->where('lahans.petani_id', $id)
    //        ->get();
   
    //        foreach ($total_panen as $val) {
    //            $hasil = (float)$val->katak;
    //        }
           return view('pimpinan.detail_kelompok');
   
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
