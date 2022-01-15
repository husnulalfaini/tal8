<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bibit;
use Exception;
use App\Models\Pesanan;
use App\Models\Tambah_Bibit;

class BibitController extends Controller
{
    public function index()
    {
        $bibit=Bibit::all();
        $tambah=Tambah_Bibit::all();
        // // cetak pdf
        // $pdf = \PDF::loadView('admin.cetak_kelompok',$data);
        
        return view ('admin.daftar_stok',compact('bibit','tambah'));
    }


    public function TambahStok(Request $request)
    {

        //mengisi data baru 
        
        $tambah_bibit= new Tambah_Bibit([
            'bibit_id'      => 1,
            'stok_katak'    => $request->get('stok_katak'),
            'stok_umbi'     => $request->get('stok_umbi'),
            'harga_katak'   => $request->get('harga_katak'),
            'harga_umbi'    => $request->get('harga_umbi'),
            'supplier'      => $request->get('supplier'),
        ]);
        // menyimpan data isian
        $tambah_bibit->save();
        return redirect()->route('daftar_stok')->with('success','Data Stok Berhasil Ditambah');
    }

    public function cetakInvoice($id)
    {
        
        $data ['pesanan'] = Pesanan::find($id);
        $data ['total'] = Pesanan::find($id);

        // cetak pdf
        $pdf = \PDF::loadView('admin.cetak_invoice',$data);

        return $pdf->stream('Invoice.pdf');
    }


    public function Pesanan()
    {
        $pesanan=Pesanan::all();
        if ($pesanan) {
        //     return abort(403,'Anda tidak punya akses karena anda Malas Ngoding');
        return view ('admin.daftar_pesanan',compact('pesanan'));
    }
    return view ('errors.daftar_pesanan');
        // try {
        //     $pesanan=Pesanan::all();
        // } catch (Throwable $e) {
        //     report($e);
    
        //     return false;
        // }
    }


    public function updateStatus(Request $request, $id)
    {
        // menerima data petani daftar
        $pesanan= Pesanan::findOrFail($id);
            $pesanan->status= 1;
            $pesanan->update();

            return redirect()->route('pesanan')->with('success','Data Transaksi Berhasil di Konfirmasi');
    }


    public function destroy($id)
    {
        // menghapus data petani mendaftar
        $hapus =Pesanan::find($id);
        $hapus->delete();
    
        return redirect()->route('pesanan')->with('success','Data Transaksi Berhasil di Batalkan');
    }
}
