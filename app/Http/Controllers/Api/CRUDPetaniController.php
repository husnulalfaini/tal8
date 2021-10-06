<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lahan;
use App\Models\Tanam;
use App\Models\Panen;

class CRUDPetaniController extends Controller
{
    public function InputLahan()
    {
        //proses input data panen baru
        $lahan = Lahan::create([
                
            'petani_id' => $request->input('petani_id'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'luas_lahan' => $request->input('luas_lahan'),
            'foto' => $request->input('foto'),
            
        ]);

        if ($lahan) {
            return response()->json([
                'success' => true,
                'message' => 'Data Panen Berhasil Disimpan!',
                'tanam' => $lahan,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Panen Gagal Disimpan!',
            ], 401);
        }
    }


    public function InputTanam()
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
                'message' => 'Data Panen Berhasil Disimpan!',
                'tanam' => $tanam,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Panen Gagal Disimpan!',
            ], 401);
        }
    }


    public function InputPanen()
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
