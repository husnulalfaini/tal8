<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\Lahan;
use App\Models\Tanam;
use App\Models\Panen;

class CRUDPetaniController extends Controller
{
    // GET DaTa

    // menampilkan data seluruh kelompok
    public function GetKelompok()
    {
        $kelompok = Kelompok::all();
        return response()->json($kelompok);
    }
    // menampilkan data lahan sesuai id petani
    public function GetLahan($id)
    {
        $lahan = Lahan::where('id', $id)->get();
        // dd($lahan);
        return response()->json($lahan);
    }

    // menampilkan data tanam sesuai id petani
    public function GetTanam($id)
    {
        $tanam = Tanam::where('petani_id',$id)->get();
        return response()->json($tanam);
    }

    // menampilkan data panen sesuai id petani
    public function GetPanen($id)
    {
        // $panen = Panen::where('petani_id',$id)->get();
        $panen= Panen::select('petanis.nama as nama','petanis.alamat as alamat','lahans.id as lahan_id', 'panens.created_at as tanggal', 'panens.panen_umbi as umbi', 'panens.panen_katak as katak')
        ->join('lahans','lahans.id','=','panens.lahan_id')
        ->join('petanis','petanis.id','=','lahans.petani_id')
        ->where('lahans.petani_id', $id)
        ->get();
        return response()->json($panen);
    }

    // POST DATA
    public function InputLahan(Request $request)
    {
        //proses input data panen baru
        $image = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move('public/storage', $image);

        $lahan = Lahan::create([
                
            'petani_id' => $request->input('petani_id'),
            'kelompok_id' => $request->input('kelompok_id'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'luas_lahan' => $request->input('luas_lahan'),
            'foto' => $image,

            
        ]);

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
                
            'lahan_id' => $request->input('lahan_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah_bibit' => $request->input('jumlah_bibit'),

            
        ]);

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
                
            'lahan_id' => $request->input('lahan_id'),
            'panen_katak' => $request->input('panen_katak'),
            'panen_umbi' => $request->input('panen_umbi'),
            'tanggal' => $request->input('tanggal'),
            
        ]);

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


    // UPDATE DATA
    // update data lahan
    public function UpdateLahan(Request $request)
    {       
        $lahan = Lahan::where('id','=',$request->id)->first();
        $lahan->id   = $request->id;
        $lahan->petani_id  = $request->petani_id;
        $lahan->kelompok_id   = $request->kelompok_id;
        $lahan->nama   = $request->nama;
        $lahan->alamat   = $request->alamat;
        $lahan->luas_lahan  = $request->luas_lahan;

        $image = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move('public/storage', $image);
        $lahan->foto        = $image;

        $lahan->save();

        return response()->json($lahan, 201);
    }


    public function UpdateTanam(Request $request)
    {       
        $panen = Tanam::where('id','=',$request->id)->first();
        $panen->id   = $request->id;
        $panen->petani_id  = $request->petani_id;
        $panen->lahan_id   = $request->lahan_id;
        $panen->tanggal   = $request->tanggal;
        $panen->jumlah_bibit  = $request->jumlah_bibit;

        $panen->save();

        return response()->json($panen, 201);
    }


    public function UpdatePanen(Request $request)
    {       
        $panen = Panen::where('id','=',$request->id)->first();
        $panen->id   = $request->id;
        $panen->petani_id  = $request->petani_id;
        $panen->lahan_id   = $request->lahan_id;
        $panen->panen_katak   = $request->panen_katak;
        $panen->panen_umbi   = $request->panen_umbi;
        $panen->tanggal  = $request->tanggal;
        $panen->save();

        return response()->json($panen, 201);
    }

}
