<?php

namespace App\Http\Controllers\pimpinan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Panen;
use App\Models\User;
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
        // menampilkan seluruh data kelompok
        $kelompok = Kelompok::all();

        // menampilkan seluruh data ketua
        $ketua= User::where('level','ketua')->get();

        return view('pimpinan.daftar_kelompok', compact('kelompok','ketua'));
    }


    public function show($id)
    {
        
       $kelompok = Kelompok::find($id);
      
       // mencari ketua kelompok berdasarkan id kelompok yang sama
       $ketua=User::where('kelompok_id', $id)->first();

       // total petani
       $anggota = Petani::all()
           ->where('kelompok_id',$id)
           ->count();

        // menjumlah lahan,
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

        // menampilkan data panen petani
        $panen = Panen::select('petanis.nama as nama','lahans.nama as lahan','panens.panen_umbi as panen_umbi','panens.panen_katak as panen_katak','panens.tanggal as tanggal')
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->join('kelompoks','kelompoks.id','=','petanis.kelompok_id')
            ->where('petanis.kelompok_id', $id)
            ->get();
            
        return view('pimpinan.detail_kelompok', compact('panen','kelompok','anggota','jumlah_lahan','hasil','ketua'));
   
    }


    public function kelompokPdf($id)
    {
        $data ['kelompok'] = Kelompok::find($id);

        // data anggota tani
        $data ['anggota']=Petani::where('kelompok_id', $id)->count();

        // data ketua
        $data ['ketua']=User::where('kelompok_id', $id)->first();

        // menjumlah lahan,
        $data ['jumlah_lahan'] = Lahan::where('kelompok_id', $id)->count();

        // menampilkan total panen
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('kelompoks','kelompoks.id','=','lahans.petani_id')
            ->where('lahans.kelompok_id', $id)
            ->get();

        foreach ($total_panen as $val) {
            $data ['hasil'] = (float)$val->katak;
        }

        // menampilkan data panen petani
        $data ['panen'] = Panen::select('petanis.nama as nama','lahans.nama as lahan','panens.panen_umbi as panen_umbi','panens.panen_katak as panen_katak','panens.tanggal as tanggal')
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->join('kelompoks','kelompoks.id','=','petanis.kelompok_id')
            ->where('petanis.kelompok_id', $id)
            ->get();
    
        $pdf = \PDF::loadView('pimpinan.kelompok_pdf',$data);
        
        return $pdf->stream('Rekap_kelompok.pdf');
    }
}
