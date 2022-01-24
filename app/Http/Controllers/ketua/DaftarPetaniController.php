<?php

namespace App\Http\Controllers\ketua;

use App\Models\Petani;
use App\Models\Panen;
use App\Models\Tanam;
use App\Models\Lahan;
use DB;
use Carbon\Carbon;
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

        $empty ='-- Data Tidak Tersedia --';

        return view('ketua.daftar_petani', compact('daftar_petani','empty'));
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
            
        // menampilkan data panen petani
        // $tanam_petani = Tanam::select(DB::raw('*'))
        //     ->join('lahans','lahans.id','=','tanams.lahan_id')
        //     ->join('petanis','petanis.id','=','lahans.petani_id')
        //     ->where('lahans.petani_id', $id)
        //     ->get();
    
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

        $empty ='-- Data Tidak Tersedia --';

        return view('ketua.monitoring_petani', compact('petani','lahan','luas_lahan','jumlah_lahan','hasil','panen_petani','empty'));
    
    }


    public function lahan($id)
    {  
        // menampilkan data sensor sesuai lahan petani
        $monitoring_lahan = PengolahanSensor::where('lahan_id', $id)->get();

        // menampilkan data panen sesuai lahan petani
        $panen_petani = Panen::where('lahan_id', $id)->get();

        // menampilkan data Tanam sesuai lahan petani
        // $tanam_petani = Tanam::where('lahan_id', $id)->get();

        // grafik panen
        $sensor = PengolahanSensor::select(DB::raw('pengolahan_sensors.kelembapan as kelembapan'),DB::raw('pengolahan_sensors.ph as ph'), DB::raw('TIME(pengolahan_sensors.created_at) as tanggal'))
        ->join('lahans','lahans.id','=','pengolahan_sensors.lahan_id')
        ->join('petanis','petanis.id','=','lahans.petani_id')
        ->where('lahans.id', $id)
        ->groupBy('pengolahan_sensors.id')
        ->get();       

        $tgl_sensor = [];
        $data_kelembapan = [];
        $data_ph = [];
        foreach ($sensor as $kel){
            $tgl_sensor[]= $kel->tanggal;
            $data_kelembapan[]= (float)$kel->kelembapan;
            $data_ph[]= (float)$kel->ph;
        }

        $empty ='-- Data Tidak Tersedia --';

        return view('ketua.monitoring_lahan', compact('monitoring_lahan','panen_petani','tgl_sensor','data_kelembapan','data_ph','empty'));

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


    public function tidakAktif(Type $var = null)
    {
        $id = Auth::user()->kelompok_id;
        
        // menampilkan seluruh data petani
        $daftar_petani= Petani::all()
            ->where('status',3)
            ->where('kelompok_id',$id);

        $empty ='-- Data Tidak Tersedia --';

        return view('ketua.petani_tidakAktif', compact('daftar_petani','empty'));
    }


    public function update(Request $request, $id)
    {
        // menerima data petani daftar
        $update= Petani::findOrFail($id);
        $update->status= 3;
        $update->update();

        return redirect('/daftar_petani')->with('success', 'Petani Berhasil Dihapus');   
    }
}
