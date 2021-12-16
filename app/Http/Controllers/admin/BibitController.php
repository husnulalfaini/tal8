<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bibit;
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
            'bibit_id'      => $request->get('bibit_id'),
            'stok'          => $request->get('stok'),
            'harga_beli'    => $request->get('harga_beli'),
            'harga_jual'    => $request->get('harga_jual'),
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
        return view ('admin.daftar_pesanan',compact('pesanan'));
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
