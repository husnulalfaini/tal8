<?php

use App\Http\Controllers\admin\DaftarUserController;
use App\Http\Controllers\admin\TambahUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ketua\DaftarPetaniController;
use App\Http\Controllers\ketua\DashboardController;
use App\Http\Controllers\ketua\EditProfileController;
use App\Http\Controllers\ketua\KonfirmasiController;
use App\Http\Controllers\ketua\KonfirmasiPetaniController;
use App\Http\Controllers\ketua\LihatAgendaController;
use App\Http\Controllers\ketua\MonitoringLahanController;
use App\Http\Controllers\ketua\MonitoringPetaniController;
use App\Http\Controllers\pimpinan\DaftarKelompokController;
use App\Http\Controllers\pimpinan\DashboardController as PimpinanDashboardController;
use App\Http\Controllers\pimpinan\DetailKelompokController;
use App\Http\Controllers\pimpinan\EditProfileController as PimpinanEditProfileController;
use App\Http\Controllers\pimpinan\KelolaAgendaController;
use App\Http\Controllers\pimpinan\TambahKelompokController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// halaman admin
Route::group(['middleware' => ['auth','CekLevel:admin']], function () {
  Route::get('/daftar_user', [DaftarUserController::class, 'index'])->name('daftar_user');
  Route::get('/tambah_user', [TambahUserController::class, 'index']);
});

// halaman pimpinan
Route::group(['middleware' => ['auth','CekLevel:pimpinan']], function () {
  Route::get('/dashboard_pimpinan', [PimpinanDashboardController::class, 'index'])->name('dashboard_pimpinan');
    Route::get('/daftar_kelompok', [DaftarKelompokController::class, 'index']);
    Route::get('/detail_kelompok', [DetailKelompokController::class, 'index']);
    Route::get('/edit_profile', [PimpinanEditProfileController::class, 'index']);
    Route::get('/kelola_agenda', [KelolaAgendaController::class, 'index']);
    Route::get('/tambah_kelompok', [TambahKelompokController::class, 'index']);

});

// halaman ketua
Route::group(['middleware' => ['auth','CekLevel:ketua']], function () {
    Route::get('/dashboard_ketua', [DashboardController::class, 'index'])->name('dashboard_ketua');
    Route::post('/edit_profile', [EditProfileController::class, 'index']);
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index']);
    Route::get('/konfirmasi_petani', [KonfirmasiPetaniController::class, 'index']);
    Route::get('/lihat_agenda', [LihatAgendaController::class, 'index']);
    Route::get('/daftar_petani', [DaftarPetaniController::class, 'index']);
    Route::get('/monitoring_petani/{item}', [DaftarPetaniController::class, 'show'])->name('ketua.monitoring_petani');
    // Route::get('/monitoring_petani', [MonitoringPetaniController::class, 'index']);
    Route::get('/monitoring_lahan', [MonitoringLahanController::class, 'index']);
  });

