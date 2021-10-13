<?php

namespace App\Http\Controllers\ketua;

use App\Models\Petani;
use App\Models\Tanam;
use App\Models\Panen;
use App\Models\Lahan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_petani = Petani::count();
        $luas_lahan = Lahan::sum('luas_lahan');
        $panen_katak = Panen::sum('panen_katak');
        $panen_umbi = Panen::sum('panen_umbi');
        $total_panen = $panen_katak + $panen_umbi;
        $jumlah_lahan = Petani::count();
        
        $data_panen= Panen::all();

        return view('ketua.dashboard', compact('jumlah_petani','data_panen','luas_lahan','jumlah_lahan','total_panen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
