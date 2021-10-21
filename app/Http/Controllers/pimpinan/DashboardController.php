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
        $total_kelompok = Kelompok::count();
        $jumlah_petani = Petani::count();
        $luas_lahan = Lahan::sum('luas_lahan');
        $panen_katak = Panen::sum('panen_katak');
        $panen_umbi = Panen::sum('panen_umbi');
        $total_panen = $panen_katak + $panen_umbi;
        $jumlah_lahan = Petani::count();
        
        // ->join('lahans','lahans.id','=','panens.lahan_id')
        // ->join('petanis','petanis.id','=','lahans.petani_id')
        // ->where('lahans.petani_id', $id)
        // ->get();

        $panens= Panen::all();

        // menyiapkan data panen grafik
        // $grafik=Panen::whereDate('created_at', Carbon::today())->get();
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
        //   dd($tgl_panen);
        //  $id = Auth::user()->id;
        //  $panens = Panen::select('lahans.kelompok_id', 'kelompoks.nama as nama', 'kelompoks.alamat as alamat', 'panens.tanggal as tanggal')
        // ->join('lahans','lahans.id','=','panens.lahan_id')
        // ->join('kelompoks','kelompoks.id','=','lahans.kelompok_id')
        // ->where('kelompoks.user_id', $id)
        // ->get();
                    
        //  $panens = Panen::select('lahans.kelompok_id', 'kelompoks.nama as nama', 'kelompoks.alamat as alamat', DB::raw('SUM(panen_katak) as total'), 'panens.tanggal as tanggal')
        // ->join('lahans','lahans.id','=','panens.lahan_id')
        // ->join('kelompoks','kelompoks.id','=','lahans.kelompok_id')
        // ->where('kelompoks.user_id', $id)
        // ->groupBy('lahans.kelompok_id')
        // ->paginate(10);             

        // $panens->setCollection($panens->sortByDesc('total'));
        return view('pimpinan.dashboard', compact('jumlah_petani','panens','total_kelompok','luas_lahan','jumlah_lahan','total_panen','tgl_panen','panen_umbi'));
    
        // return view('pimpinan.dashboard');
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
