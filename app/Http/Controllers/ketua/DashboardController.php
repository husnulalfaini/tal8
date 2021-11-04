<?php

namespace App\Http\Controllers\ketua;

use App\Models\Petani;
use App\Models\Tanam;
use App\Models\Panen;
use App\Models\Lahan;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::user()->kelompok_id;

        // total petani
        $anggota = Petani::all()
            ->where('kelompok_id',$id)
            ->count();

        // menghitung total lahan petani
        $luas_lahan = Lahan::where('kelompok_id', $id)->count();

        // menghitung total panen petani
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
        ->join('lahans','lahans.id','=','panens.lahan_id')
        ->join('petanis','petanis.id','=','lahans.petani_id')
        ->where('lahans.petani_id', $id)
        ->get();

        foreach ($total_panen as $val) {
            $hasil = (float)$val->katak;
        }

        $jumlah_lahan = Lahan::all()
        ->where('kelompok_id',$id)
        ->count();

        //    menampilkan data panen petani
       $data_panen= Panen::select('petanis.nama as nama','petanis.alamat as alamat','lahans.nama as lahan', 'panens.created_at as tanggal', 'panens.panen_umbi as umbi', 'panens.panen_katak as katak')
       ->join('lahans','lahans.id','=','panens.lahan_id')
       ->join('petanis','petanis.id','=','lahans.petani_id')
       ->where('lahans.petani_id', $id)
       ->get();

       $panen_tabel = Panen::select(DB::raw('SUM(panen_umbi)+SUM(panen_katak) as total'), DB::raw('YEAR(panens.tanggal) as year'))
       ->join('lahans','lahans.id','=','panens.lahan_id')
       ->join('petanis','petanis.id','=','lahans.petani_id')
       ->where('lahans.petani_id', $id)
       ->groupBy('year')
       ->get();       

         $tgl_panen = [];
         $panen_umbi = [];
         foreach ($panen_tabel as $pans){
             $tgl_panen[]= $pans->year;
             $panen_umbi[]= (float)$pans->total;
         }


        return view('ketua.dashboard', compact('anggota','data_panen','luas_lahan','jumlah_lahan','hasil','tgl_panen','panen_umbi'));
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
