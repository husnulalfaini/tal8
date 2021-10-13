<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Panen;
use App\Models\Petani;
use App\Models\Lahan;
use DB;

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
        
       $kelompok = Kelompok::find($id);
        // $panen = Panen::where('kelompok_id',$id)->get();

        // anggota tani
        $anggota=Petani::where('kelompok_id', $id)->count();

        //    menjumlah lahan
        $jumlah_lahan = Lahan::where('kelompok_id', $id)->count();

         // menampilkan total panen
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
        ->join('lahans','lahans.id','=','panens.lahan_id')
        ->join('kelompoks','kelompoks.id','=','lahans.petani_id')
        ->where('lahans.kelompok_id', $id)
        ->get();

        foreach ($total_panen as $val) {
            $hasil = (float)$val->katak;
        }

        //    menampilkan data panen petani
        $panen = Panen::select('petanis.nama as nama','lahans.nama as lahan','panens.panen_umbi as panen_umbi','panens.panen_katak as panen_katak','panens.tanggal as tanggal')
        ->join('lahans','lahans.id','=','panens.lahan_id')
        ->join('petanis','petanis.id','=','lahans.petani_id')
        ->join('kelompoks','kelompoks.id','=','petanis.kelompok_id')
        ->where('petanis.kelompok_id', $id)
        ->get();
           return view('pimpinan.detail_kelompok', compact('panen','kelompok','anggota','jumlah_lahan','hasil',));
   
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
