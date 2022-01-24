<?php

use App\Http\Controllers\admin\DaftarUserController;
use App\Http\Controllers\admin\TambahUserController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\admin\BibitController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ketua\DaftarPetaniController;
use App\Http\Controllers\ketua\DashboardController;
use App\Http\Controllers\ketua\ProfileKetuaController;
use App\Http\Controllers\ketua\KonfirmasiController;

use App\Http\Controllers\pimpinan\DaftarKelompokController;
use App\Http\Controllers\pimpinan\DashboardController as PimpinanDashboardController;
use App\Http\Controllers\pimpinan\ProfilePimpinanController;
use App\Http\Controllers\pimpinan\TambahKelompokController;
use App\Http\Controllers\pimpinan\TambahKetuaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// halaman awal

// Route::get('/', function () {
//     return view('landing');
// });
// Route::get('/loginv1', function () {
//     return view('loginv1');
// });

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/halaman_reset', [LoginController::class, 'tampilReset'])->name('halaman.reset');
Route::post('/reset', [LoginController::class, 'reset'])->name('reset');
Route::get('/daftar_keompok', [KelompokController::class, 'index']);

// halaman admin
Route::group(['middleware' => ['auth','CekLevel:admin']], function () {
  Route::get('/daftar_user', [DaftarUserController::class, 'index'])->name('daftar_user');
  Route::get('/show_user/{item}', [DaftarUserController::class, 'showUser'])->name('show_user');
  Route::get('/show_petani/{item}', [DaftarUserController::class, 'showPetani'])->name('show_petani');
  Route::get('/cetak_petani/{item}', [DaftarUserController::class, 'cetakPetani'])->name('cetak_petani');
  Route::get('/show_kelompok/{item}', [DaftarUserController::class, 'showKelompok'])->name('show_kelompok');
  Route::get('/cetak_kelompok/{item}', [DaftarUserController::class, 'cetakKelompok'])->name('cetak_kelompok');
  Route::get('/cetak_invoice/{item}', [BibitController::class, 'cetakInvoice'])->name('cetak_invoice');
  Route::get('/tambah_user', [TambahUserController::class, 'index'])->name('tambah_user');
  Route::post('/tambah_user/upload', [TambahUserController::class, 'store'])->name('upload.tambah_user');
  Route::get('/daftar_stok', [BibitController::class, 'index'])->name('daftar_stok');
  Route::post('/Tambah_stok', [BibitController::class, 'TambahStok'])->name('tambah_stok');
  Route::get('/pesanan', [BibitController::class, 'Pesanan'])->name('pesanan');
  Route::get('/pesanan/update/{item}', [BibitController::class, 'UpdateStatus'])->name('update_status');
  Route::get('/pesanan/batal/{item}', [BibitController::class, 'destroy'])->name('batal_pesan');
  Route::get('/pesanan_kosonh', [BibitController::class, 'pesananKosong'])->name('pesanan_kosong');
  Route::get('/profile_admin', [ProfileAdminController::class, 'index'])->name('profile_admin');
  Route::post('/profile_admin/{item}', [ProfileAdminController::class, 'update'])->name('update.profile_admin');
  Route::post('/profile_admin/foto/{item}', [ProfileAdminController::class, 'updateFoto'])->name('updateFoto.profile_admin');

});

Route::get('/passport-install', function () {
    Artisan::call('passport:install --force');
  
    dd("passport berhasil di install");
});


// halaman pimpinan
Route::group(['middleware' => ['auth','CekLevel:pimpinan']], function () {
  Route::get('/dashboard_pimpinan', [PimpinanDashboardController::class, 'index'])->name('dashboard_pimpinan');
    Route::get('/daftar_kelompok', [DaftarKelompokController::class, 'index'])->name('daftar_kelompok');
    Route::get('/daftar_kelompok/edit/{id}', [TambahKelompokController::class, 'edit'])->name('edit.kelompok');
    Route::post('/daftar_kelompok/update/{id}', [TambahKelompokController::class, 'update'])->name('update.kelompok');
    Route::get('/detail_kelompok/{item}', [DaftarKelompokController::class, 'show'])->name('detail.kelompok');
    Route::get('/profile_pimpinan', [ProfilePimpinanController::class, 'index'])->name('profile_pimpinan');
    Route::post('/profile_pimpinan/{item}', [ProfilepimpinanController::class, 'update'])->name('update.profile_pimpinan');
    Route::post('/profile_pimpinan/foto/{item}', [ProfilepimpinanController::class, 'updateFoto'])->name('updateFoto.profile_pimpinan');
    Route::get('/tambah_kelompok', [TambahKelompokController::class, 'tampilKelompok'])->name('tambah_kelompok');
    Route::post('/tambah_kelompok/upload', [TambahKelompokController::class, 'tambahKelompok'])->name('upload.tambah_kelompok');
    Route::get('/kelompok_pdf/{item}', [DaftarKelompokController::class, 'kelompokPdf'])->name('kelompok.pdf'); 
    

});

// halaman ketua
Route::group(['middleware' => ['auth','CekLevel:ketua']], function () {
    Route::get('/dashboard_ketua', [DashboardController::class, 'index'])->name('dashboard_ketua');
    Route::get('/profile_ketua', [ProfileKetuaController::class, 'show'])->name('profile_ketua');
    Route::post('/profile_ketua/{item}', [ProfileKetuaController::class, 'update'])->name('update.profile');
    Route::post('/profile_ketua/foto/{item}', [ProfileKetuaController::class, 'updateFoto'])->name('updateFoto.profile_ketua');
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('petani.daftar');
    Route::get('/konfirmasi/{id}', [KonfirmasiController::class, 'terima'])->name('konfirmasiterima');
    Route::get('/konfirmasi/edit/{id}', [KonfirmasiController::class, 'edit'])->name('edit.petani');
    Route::post('/konfirmasi/update/{id}', [KonfirmasiController::class, 'update'])->name('update.petani');
    Route::get('/hapus/{item}', [KonfirmasiController::class, 'destroy'])->name('ketua.hapus');
    Route::get('/konfirmasi_petani/{tani}', [KonfirmasiController::class, 'show'])->name('ketua.konfirmasi_petani');
    Route::get('/daftar_petani', [DaftarPetaniController::class, 'index'])->name('ketua.daftar_petani');
    Route::get('/monitoring_petani/{item}', [DaftarPetaniController::class, 'show'])->name('ketua.monitoring_petani');
    Route::get('/monitoring_lahan/{item}', [DaftarPetaniController::class, 'lahan'])->name('ketua.monitoring_lahan');
    Route::get('/petani_pdf/{item}', [DaftarPetaniController::class, 'petaniPdf'])->name('petani.pdf');
    Route::get('/tidak_aktif', [DaftarPetaniController::class, 'tidakAktif'])->name('petani.tidak_aktif');
    Route::get('/tidak_aktif/update/{id}', [DaftarPetaniController::class, 'update'])->name('update.tidak_aktif');
  });

