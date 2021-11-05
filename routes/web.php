<?php

use App\Http\Controllers\admin\DaftarUserController;
use App\Http\Controllers\admin\TambahUserController;
use App\Http\Controllers\admin\ProfileAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ketua\DaftarPetaniController;
use App\Http\Controllers\ketua\DashboardController;
use App\Http\Controllers\ketua\ProfileKetuaController;
use App\Http\Controllers\ketua\KonfirmasiController;
use App\Http\Controllers\ketua\KonfirmasiPetaniController;
use App\Http\Controllers\ketua\LihatAgendaController;
use App\Http\Controllers\ketua\MonitoringLahanController;
use App\Http\Controllers\ketua\MonitoringPetaniController;
use App\Http\Controllers\pimpinan\DaftarKelompokController;
use App\Http\Controllers\pimpinan\DashboardController as PimpinanDashboardController;
use App\Http\Controllers\pimpinan\DetailKelompokController;
use App\Http\Controllers\pimpinan\ProfilePimpinanController;
use App\Http\Controllers\pimpinan\KelolaAgendaController;
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

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// halaman admin
Route::group(['middleware' => ['auth','CekLevel:admin']], function () {
  Route::get('/daftar_user', [DaftarUserController::class, 'index'])->name('daftar_user');
  Route::get('/tambah_user', [TambahUserController::class, 'index'])->name('tambah_user');
  Route::post('/tambah_user/upload', [TambahUserController::class, 'store'])->name('upload.tambah_user');
  Route::get('/profile_admin', [ProfileAdminController::class, 'index']);
  Route::post('/profile_admin/{item}', [ProfileAdminController::class, 'update'])->name('update.profile_admin');
});

// halaman pimpinan
Route::group(['middleware' => ['auth','CekLevel:pimpinan']], function () {
  Route::get('/dashboard_pimpinan', [PimpinanDashboardController::class, 'index'])->name('dashboard_pimpinan');
    Route::get('/daftar_kelompok', [DaftarKelompokController::class, 'index'])->name('daftar_kelompok');
    Route::get('/daftar_kelompok/edit/{id}', [TambahKelompokController::class, 'edit'])->name('edit.kelompok');
    Route::post('/daftar_kelompok/update/{id}', [TambahKelompokController::class, 'update'])->name('update.kelompok');
    Route::get('/detail_kelompok/{item}', [DaftarKelompokController::class, 'show'])->name('detail.kelompok');
    Route::get('/profile_pimpinan', [ProfilePimpinanController::class, 'index']);
    Route::post('/profile_pimpinan/{item}', [ProfilepimpinanController::class, 'update'])->name('update.profile_pimpinan');
    Route::get('/kelola_agenda', [KelolaAgendaController::class, 'index']);
    Route::get('/tambah_kelompok', [TambahKelompokController::class, 'index']);
    Route::post('/tambah_kelompok/upload', [TambahKelompokController::class, 'store'])->name('upload.tambah_kelompok');
    Route::get('/tambah_ketua', [TambahKetuaController::class, 'index']);
    Route::post('/tambah_ketua/upload', [TambahKetuaController::class, 'store'])->name('upload.tambah_ketua');
    
    

});

// halaman ketua
Route::group(['middleware' => ['auth','CekLevel:ketua']], function () {
    Route::get('/dashboard_ketua', [DashboardController::class, 'index'])->name('dashboard_ketua');
    Route::get('/profile_ketua', [ProfileKetuaController::class, 'show']);
    Route::post('/profile_ketua/{item}', [ProfileKetuaController::class, 'update'])->name('update.profile');
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('petani.daftar');
    Route::get('/konfirmasi/{id}', [KonfirmasiController::class, 'terima'])->name('konfirmasiterima');
    Route::get('/hapus/{item}', [KonfirmasiController::class, 'destroy'])->name('ketua.hapus');
    Route::get('/konfirmasi_petani/{tani}', [KonfirmasiController::class, 'show'])->name('ketua.konfirmasi_petani');
    Route::get('/lihat_agenda', [LihatAgendaController::class, 'index']);
    Route::get('/daftar_petani', [DaftarPetaniController::class, 'index']);
    Route::get('/monitoring_petani/{item}', [DaftarPetaniController::class, 'show'])->name('ketua.monitoring_petani');
    // Route::get('/monitoring_petani', [MonitoringPetaniController::class, 'index']);
    Route::get('/monitoring_lahan/{item}', [DaftarPetaniController::class, 'lahan'])->name('ketua.monitoring_lahan');
    // Route::get('/monitoring_lahan', [MonitoringLahanController::class, 'index']);
  });

