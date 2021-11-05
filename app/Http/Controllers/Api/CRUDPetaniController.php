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
        $tanam = Tanam::where('lahan_id',$id)->get();
        return response()->json($tanam);
    }

    // menampilkan data panen sesuai id petani
    public function GetPanen()
    {
        $profil = Tanam::all();
        return response()->json($profil);
    }

    // POST DaTa
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
}
