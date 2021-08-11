<?php

use App\Http\Controllers\admin\DaftarUserController;
use App\Http\Controllers\admin\TambahUserController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ketua\DaftarPetaniController;
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

Route::get('/', function () {
    return view('admin.daftar_user');
});

// halaman admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('/daftar_user', [DaftarUserController::class, 'index']);
    Route::get('/tambah_user', [TambahUserController::class, 'index']);
  });

// halaman ketua
Route::group(['middleware' => ['ketua']], function () {
    Route::get('/dashboard_pimpinan', [PimpinanDashboardController::class, 'index']);
    Route::get('/daftar_kelompok', [DaftarKelompokController::class, 'index']);
    Route::get('/detail_kelompok', [DetailKelompokController::class, 'index']);
    Route::get('/edit_profile', [PimpinanEditProfileController::class, 'index']);
    Route::get('/kelola_agenda', [KelolaAgendaController::class, 'index']);
    Route::get('/tambah_kelompok', [TambahKelompokController::class, 'index']);

});

// halaman ketua
Route::group(['middleware' => ['ketua']], function () {
    Route::get('/dashboard_ketua', [DashboardController::class, 'index']);
    Route::get('/daftar_petani', [DaftarPetaniController::class, 'index']);
    Route::post('/edit_profile', [EditProfileController::class, 'index']);
    Route::get('/konfirmasi', [KonfirmasiController::class, 'index']);
    Route::get('/konfirmasi_petani', [KonfirmasiPetaniController::class, 'index']);
    Route::get('/lihat_agenda', [LihatAgendaController::class, 'index']);
    Route::get('/monitoring_lahan', [MonitoringLahanController::class, 'index']);
    Route::get('/monitoring_petani', [MonitoringPetaniController::class, 'index']);
  });

