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
        $total_kelompok = Kelompok::count();
        $jumlah_petani = Petani::count();
        $luas_lahan = Lahan::sum('luas_lahan');
        $panen_katak = Panen::sum('panen_katak');
        $panen_umbi = Panen::sum('panen_umbi');
        $total_panen = $panen_katak + $panen_umbi;
        $jumlah_lahan = Petani::count();
        $user=User::all();
        
      
        return view('landing', compact('total_kelompok','jumlah_petani','jumlah_lahan','total_panen','user'));
    }
}
