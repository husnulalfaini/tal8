<?php

namespace App\Http\Controllers\ketua;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Models\Kelompok;
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
        $id = Auth::user()->kelompok_id;

        // menampilkan data petani mendaftar
        $petani= Petani::where('status', 0)->where('kelompok_id', $id)->get();

        return view('ketua.konfirmasi', compact ('petani'));
    }


    public function show($id)
    {
        $petani = Petani::find($id);
        
        return view('ketua.konfirmasi_petani', compact ('petani'));
    }

    
    public function edit($id)
    {
        $kelompok= kelompok::all();

        $petani = Petani::find($id);

        return view('ketua.edit_kelompok',compact('kelompok','petani'));


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
       
        $petani=Petani::all();
        $petani=Petani::find($id);
          
            $petani->kelompok_id  = $request->kelompok_id;
            $petani->save();

        return redirect()->route('petani.daftar')->with('success','alamat petani berhasil dirubah');
        
    }


    public function destroy($id)
    {
        // menghapus data petani mendaftar
        $hapus =Konfirmasi::find($id);
        $hapus->delete();

        return redirect ('konfirmasi')->with('sukses','tugas berhasil dihapus');
    }

    public function terima($id)
    {
        // menerima data petani daftar
        $terima= Petani::findOrFail($id);
            $terima->status= 1;
            $terima->update();

        return redirect(route('petani.daftar'))->with('success','petani berhasil dikonfirmasi');
    }
}
