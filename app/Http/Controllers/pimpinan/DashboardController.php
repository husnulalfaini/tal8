<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petani;
use App\Models\Lahan;
use DB;
use Carbon\Carbon;
use App\Models\Panen;
use App\Models\User;
use App\Models\Kelompok;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // total kelompok
        $total_kelompok = Kelompok::count(); 

        // jumlah petani
        $jumlah_petani = Petani::count();

        // luas lahan
        $luas_lahan = Lahan::sum('luas_lahan');

        // total panen katak
        $panen_katak = Panen::sum('panen_katak');

        // total panen umbi
        $panen_umbi = Panen::sum('panen_umbi');

        // total panen keseluruhan
        $total_panen = $panen_katak + $panen_umbi;

        // jumlah petani
        $jumlah_lahan = Petani::count();

        // data panen
        $panens= Panen::all();

        // tabel grafik panen
        $panen_tabel = Panen::select(DB::raw('SUM(panen_umbi)+SUM(panen_katak) as total'), DB::raw('YEAR(panens.tanggal) as year'))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('kelompoks','kelompoks.id','=','lahans.kelompok_id')
            ->groupBy('year')
            ->get();       

        $tgl_panen = [];
        $panen_umbi = [];
        foreach ($panen_tabel as $pans){
            $tgl_panen[]= $pans->year;
            $panen_umbi[]= (float)$pans->total;
        }

        $empty ='-- Data Tidak Tersedia --';

        return view('pimpinan.dashboard', compact('jumlah_petani','panens','total_kelompok','luas_lahan','jumlah_lahan','total_panen','tgl_panen','panen_umbi','empty'));
    }
}
