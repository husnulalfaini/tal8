<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PengolahanSensor;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function kirimSensor()
    {
        $sensor = PengolahanSensor::all();
        return response()->json($sensor);
    }
    
    public function terimaSensor(Request $request)
    {   
        // pengondisian info kelembapan
        $kelembapan = $request->input('kelembapan'); 
        if ($kelembapan<300) {
            $hasilkelembapan='kelembapan tinggi';
        }
        elseif ($kelembapan>600) {
            $hasilkelembapan='kelembapan rendah';
        }
        else {
            $hasilkelembapan='kelembapan normal';
        }

        // pengondisian info ph
        $ph = $request->input('ph');
        if ($ph<6) {
            $hasilph='asam';
        } 
        elseif ($ph>7) {
            $hasilph='basa';
        }
        else {
            $hasilph='normal';
        }


        // pengondisian rekom kelembapan
        $kelembapan = $request->input('kelembapan'); 
        if ($kelembapan<300) {
            $rekomkelembapan='kelembapan tinggi';
        }
        elseif ($kelembapan>600) {
            $rekomkelembapan='kelembapan rendah';
        }
        else {
            $rekomkelembapan='kelembapan normal';
        }

        // pengondisian rekom ph
        $ph = $request->input('ph');
        if ($ph<6) {
            $rekomph='asam';
        } 
        elseif ($ph>7) {
            $rekomph='basa';
        }
        else {
            $rekomph='normal';
        }


        //proses create data baru
        $sensor = PengolahanSensor::create([
            
            'lahan_id' => $request->input('lahan_id'),
            'kelembapan' => $request->input('kelembapan'),
            'ph' => $request->input('ph'),
            'info_kelembapan' => $hasilkelembapan,
            'info_ph' => $hasilph,
            'rekom_kelembapan' => $rekomkelembapan,
            'rekom_ph' => $rekomph,
            
            
        ]);

        if ($sensor) {
            return response()->json([
                'success' => true,
                'message' => 'Data Sensor Berhasil Disimpan!',
                'sensor' => $sensor,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Sensor Gagal Disimpan!',
            ], 401);
        }
    }
}
