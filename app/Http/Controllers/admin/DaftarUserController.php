<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Petani;
use App\Models\Kelompok;
use App\Models\Lahan;
use App\Models\Panen;
use DB;

class DaftarUserController extends Controller
{
  
    public function index()
    {
        // menampilkan seluruh data user kecuali ketua
        $user=User::where('level', !'ketua')->get();

        // menampilkan data seluruh petani
        $petani=Petani::all();

        // menampilkan data seluruh kelompok
        $kelompok=Kelompok::all();
        $empty ='-- Data Tidak Tersedia --';
        return view('admin.daftar_user', compact('user','petani','kelompok','empty'));
    }


    public function showUser($id)
    {
        $user = User::find($id);

        $empty ='-- Data Tidak Tersedia --';

        return view('admin.detail_user', compact('user','empty'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPetani($id)
    {
        $petani = Petani::find($id);

        // menjumlah luas lahan
        $luas_lahan = Lahan::where('petani_id', $id)->sum('luas_lahan');

        // menjumlah lahan
        $jumlah_lahan = Lahan::where('petani_id', $id)->count();
     
        // menampilkan data panen petani
        $panen_petani = Panen::select(DB::raw('*'))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();

        // menghitung total panen petani
        $total_panen = Panen::select(DB::raw('SUM(panen_katak)+SUM(panen_umbi)  as katak' ))
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();

        foreach ($total_panen as $val) {
            $hasil = (float)$val->katak;
        }

        $empty ='-- Data Tidak Tersedia --';
        
        return view('admin.detail_petani', compact('petani','luas_lahan','jumlah_lahan','hasil','panen_petani','empty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showKelompok($id)
    {
        $kelompok = Kelompok::find($id);

        // mencari ketua kelompok berdasarkan id kelompok yang sama
        $ketua=User::where('kelompok_id', $id)->first();

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

        // menampilkan jumlah lahan sesuai dengan id kelompok dari petani
        $jumlah_lahan = Lahan::all()
            ->where('kelompok_id',$id)
            ->count();

        //    menampilkan data panen petani
        $data_panen= Panen::select('petanis.nama as nama','petanis.alamat as alamat','lahans.nama as lahan', 'panens.created_at as tanggal', 'panens.panen_umbi as umbi', 'panens.panen_katak as katak')
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();
        
        $empty ='-- Data Tidak Tersedia --';

        return view('admin.detail_kelompok', compact('kelompok','ketua','anggota','data_panen','luas_lahan','jumlah_lahan','hasil',));
    }


    public function cetakPetani($id)
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

        // menjumlah lahan sesuai yang dimiliki petani
        $data['jumlah_lahan'] = Lahan::where('petani_id', $id)->count();

        // menampilkan data lahan sesuai yang dimiliki petani
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

        // mencetak pdf
        $pdf = \PDF::loadView('admin.cetak_petani',$data);
        return $pdf->stream('Rekap_Petani.pdf');
    }


    public function cetakKelompok($id)
    {
        $data ['kelompok'] = Kelompok::find($id);

        // menampilkan data petani sesuai kelompok yang sama
        $data ['anggota']=Petani::where('kelompok_id', $id)->count();

        // menampilkan ketua berdasarkan id kelompok yang sama dengan kelompok
        $data ['ketua']=User::where('kelompok_id', $id)->first();

        // menjumlah lahan kelompok
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

        // cetak pdf
        $pdf = \PDF::loadView('admin.cetak_kelompok',$data);

        return $pdf->stream('Rekap_kelompok.pdf');
    }
}
