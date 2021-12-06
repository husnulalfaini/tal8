<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Models\Lahan;
use DB;
use Carbon\Carbon;
use App\Models\Panen;
use App\Models\User;
use App\Models\Kelompok;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        // total kelompok
        $total_kelompok = Kelompok::count(); 

        // jumlah petani
        $jumlah_petani = Petani::count();

        // luas lahan
        $luas_lahan = Lahan::sum('luas_lahan');

        // total panen katak
        $panen_katak = Panen::sum('panen_katak');

        // total panen umbi
        $panen_umbi = Panen::sum('panen_umbi');

        // total panen keseluruhan
        $total_panen = $panen_katak + $panen_umbi;

        // jumlah petani
        $jumlah_lahan = Petani::count();

        // data user
        $user=User::all();
        
      
        return view('landing', compact('total_kelompok','jumlah_petani','jumlah_lahan','total_panen','user'));
    }
}
