<?php

namespace App\Http\Controllers\ketua;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Models\Konfirmasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $petani= Petani::where('status', 0)->where('user_id', $id)->get();
        return view('ketua.konfirmasi', compact ('petani'));
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
        $petani = Petani::find($id);
        return view('ketua.konfirmasi_petani', compact ('petani'));
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
        $hapus =Konfirmasi::find($id);
        $hapus->delete();
        return redirect ('konfirmasi')->with('sukses','tugas berhasil dihapus');
    }

    public function terima($id)
    {
    $terima= Petani::findOrFail($id);
    $terima->status= 1;
    $terima->update();
    return redirect(route('petani.daftar'));
    }
}
