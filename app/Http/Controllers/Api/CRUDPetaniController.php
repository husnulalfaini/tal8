<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Lahan;
use App\Models\Tanam;
use App\Models\Panen;
use App\Models\Pesanan;
use App\Models\Bibit;

class CRUDPetaniController extends Controller
{
    
    public function GetKelompok()
    {
        // menampilkan data seluruh kelompok
        $kelompok = Kelompok::all();

        return response()->json($kelompok);
    }


    public function GetLahan($id)
    {
        // menampilkan data lahan sesuai id petani
        $lahan = Lahan::where('id', $id)->get();
        
        return response()->json($lahan);
    }

    
    public function GetTanam($id)
    {
        // menampilkan data tanam sesuai id petani
        $tanam = Tanam::where('petani_id',$id)->get();

        return response()->json($tanam);
    }

   
    public function GetPanen($id)
    {
        // menampilkan data panen sesuai id petani
        $panen= Panen::select('petanis.nama as nama','petanis.alamat as alamat','lahans.id as lahan_id', 'panens.created_at as tanggal', 'panens.panen_umbi as umbi', 'panens.panen_katak as katak')
            ->join('lahans','lahans.id','=','panens.lahan_id')
            ->join('petanis','petanis.id','=','lahans.petani_id')
            ->where('lahans.petani_id', $id)
            ->get();

        return response()->json($panen);
    }

    
    public function InputLahan(Request $request)
    {
        // menyimpan data foto dengan nama asli
        $image = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move('public/storage', $image);

        //proses input data panen baru
        $lahan = Lahan::create([               
            'petani_id'     => $request->input('petani_id'),
            'kelompok_id'   => $request->input('kelompok_id'),
            'nama'          => $request->input('nama'),
            'alamat'        => $request->input('alamat'),
            'luas_lahan'    => $request->input('luas_lahan'),
            'foto'          => $image,         
        ]);

        // pengondisian sukses
        if ($lahan) {
            return response()->json([
                'success' => true,
                'message' => 'Data Lahan Berhasil Disimpan!',
                'tanam' => $lahan,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Lahan Gagal Disimpan!',
            ], 401);
        }
    }


    public function InputTanam(Request $request)
    {
        //proses input data panen baru
        $tanam = Tanam::create([
                
            'lahan_id'      => $request->input('lahan_id'),
            'tanggal'       => $request->input('tanggal'),
            'jumlah_bibit'  => $request->input('jumlah_bibit'),        
        ]);

        // pengondisian sukses
        if ($tanam) {
            return response()->json([
                'success' => true,
                'message' => 'Data Tanam Berhasil Disimpan!',
                'tanam' => $tanam,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tanam Gagal Disimpan!',
            ], 401);
        }
    }


    public function InputPanen(Request $request)
    {
        //proses input data panen baru
        $panen = Panen::create([
                
            'lahan_id'      => $request->input('lahan_id'),
            'panen_katak'   => $request->input('panen_katak'),
            'panen_umbi'    => $request->input('panen_umbi'),
            'tanggal'       => $request->input('tanggal'),    
        ]);

        // pengondisian sukses
        if ($panen) {
            return response()->json([
                'success' => true,
                'message' => 'Data Panen Berhasil Disimpan!',
                'panen' => $panen,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Panen Gagal Disimpan!',
            ], 401);
        }
    }



    public function InputPesanan(Request $request)
    {
        $bibit = Bibit::where('id',$request->input('bibit_id'))->get()->toArray();
        // return $bibit;
        $harga_katak = $bibit[0]['harga_katak'];
        $harga_umbi = $bibit[0]['harga_umbi'];

        $total_katak = $harga_katak*$request->input('stok_katak');
        $total_umbi = $harga_umbi*$request->input('stok_umbi');
        $total = $total_katak+$total_umbi;
        $catatan = 'silahkan kirim bukti tranfer ke no wa 0888888888 paling lambat 1x24jam';
        //proses input data pesan baru
        $pesan = Pesanan::create([
                
            'petani_id'         => $request->input('petani_id'),
            'bibit_id'          => $request->input('bibit_id'),
            'stok_katak'        => $request->input('stok_katak'),
            'stok_umbi'         => $request->input('stok_umbi'),
            'harga_katak'       => $harga_katak,
            'harga_umbi'        => $harga_umbi,
            'total_bayar'       => $total,    
            'catatan'           => $catatan,    
        ]);

        // pengondisian sukses
        if ($pesan) {
            return response()->json([
                'success' => true,
                'message' => 'Data Pesan Berhasil Disimpan!',
                'pesan' => $pesan,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesan Gagal Disimpan!',
            ], 401);
        }
    }


    public function UpdateLahan(Request $request)
    {   
        // update data lahan dengan id sesuai request    
        $lahan = Lahan::where('id','=',$request->id)->first();

            $lahan->id              = $request->id;
            $lahan->petani_id       = $request->petani_id;
            $lahan->kelompok_id     = $request->kelompok_id;
            $lahan->nama            = $request->nama;
            $lahan->alamat          = $request->alamat;
            $lahan->luas_lahan      = $request->luas_lahan;

            $image                  = $request->file('foto')->getClientOriginalName();
                                      $request->file('foto')->move('public/storage', $image);
            $lahan->foto            = $image;
            $lahan->save();

        return response()->json($lahan, 201);
    }


    public function UpdateTanam(Request $request)
    { 
        // update data Tanam dengan id sesuai request       
        $panen = Tanam::where('id','=',$request->id)->first();

            $panen->id              = $request->id;
            $panen->petani_id       = $request->petani_id;
            $panen->lahan_id        = $request->lahan_id;
            $panen->tanggal         = $request->tanggal;
            $panen->jumlah_bibit    = $request->jumlah_bibit;
            $panen->save();

        return response()->json($panen, 201);
    }


    public function UpdatePanen(Request $request)
    {
        // update data Panen dengan id sesuai request              
        $panen = Panen::where('id','=',$request->id)->first();

            $panen->id              = $request->id;
            $panen->petani_id       = $request->petani_id;
            $panen->lahan_id        = $request->lahan_id;
            $panen->panen_katak     = $request->panen_katak;
            $panen->panen_umbi      = $request->panen_umbi;
            $panen->tanggal         = $request->tanggal;
            $panen->save();

        return response()->json($panen, 201);
    }

}
