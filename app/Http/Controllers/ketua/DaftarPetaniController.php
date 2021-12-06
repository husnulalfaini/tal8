<?php

namespace App\Http\Controllers\ketua;

use App\Models\Petani;
use App\Models\Panen;
use App\Models\Tanam;
use App\Models\Lahan;
use DB;
// use PDF;
use App\Models\PengolahanSensor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $id = Auth::user()->kelompok_id;
        
        // menampilkan seluruh data petani
        $daftar_petani= Petani::all()
            ->where('status',1)
            ->where('kelompok_id',$id);

        return view('ketua.daftar_petani', compact('daftar_petani'));
    }

    
    public function show($id)
    {
        $petani = Petani::find($id);

        // menampilkan data panen petani
        $panen_petani = Panen::select(DB::raw('*'))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();
    
        // menjumlah luas lahan
        $luas_lahan = Lahan::where('petani_id', $id)->sum('luas_lahan');

        // menjumlah lahan
        $jumlah_lahan = Lahan::where('petani_id', $id)->count();

        // menampilkan data lahan sesuai yang dimiliki petani
        $lahan = Lahan::where('petani_id', $id)->get();
       
        // menghitung total panen petani
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();

        foreach ($total_panen as $val) {
            $hasil = (float)$val->katak;
        }

        return view('ketua.monitoring_petani', compact('petani','lahan','luas_lahan','jumlah_lahan','hasil','panen_petani'));
    
    }


    public function lahan($id)
    {  
        // menampilkan data sensor sesuai lahan petani
        $monitoring_lahan = PengolahanSensor::where('lahan_id', $id)->get();

        // menampilkan data panen sesuai lahan petani
        $panen_petani = Panen::where('lahan_id', $id)->get();

        // menampilkan data Tanam sesuai lahan petani
        $tanam_petani = Tanam::where('lahan_id', $id)->get();

        return view('ketua.monitoring_lahan', compact('monitoring_lahan','panen_petani','tanam_petani'));

    }


    public function petaniPdf($id)
    {
        $data['petani'] = Petani::find($id);

        // menampilkan data panen petani
        $data['panen_petani'] = Panen::select(DB::raw('*'))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();
    
        // menjumlah luas lahan
        $data ['luas_lahan'] = Lahan::where('petani_id', $id)->sum('luas_lahan');

        // menjumlah lahan
        $data['jumlah_lahan'] = Lahan::where('petani_id', $id)->count();

        //menampilkan data lahan sesuai yang dimiliki petani
        $lahan = Lahan::where('petani_id', $id)->get();
           
        // menghitung total panen petani
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();

        foreach ($total_panen as $val) {
            $data['hasil'] = (float)$val->katak;
        }

        $pdf = \PDF::loadView('ketua.petani_pdf',$data);
        
        return $pdf->stream('Rekap_Petani.pdf');
    }
}
