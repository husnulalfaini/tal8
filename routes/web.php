<?php

use Illuminate\Support\Facades\Route;

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

// halaman ketua
Route::get('/daftar_petani', function () {
    return view('ketua.daftar_petani');
});
Route::get('/edit_profile', function () {
    return view('ketua.edit_profile');
});
Route::get('/konfirmasi', function () {
    return view('ketua.konfirmasi');
});
Route::get('/konfirmasi_petani', function () {
    return view('ketua.konfirmasi_petani');
});
Route::get('/lihat_agenda', function () {
    return view('ketua.lihat_agenda');
});
Route::get('/monitoring_lahan', function () {
    return view('ketua.monitoring_lahan');
});
Route::get('/monitoring_petani', function () {
    return view('ketua.monitoring_petani');
});
Route::get('/rekap_data', function () {
    return view('ketua.rekap_data');
});


// halaman pimpinan
Route::get('/daftar_kelompok', function () {
    return view('pimpinan.daftar_kelompok');
});
Route::get('/detail_kelompok', function () {
    return view('pimpinan.detail_kelompok');
});
Route::get('/edit_profile', function () {
    return view('pimpinan.edit_profile');
});
Route::get('/tambah_kelompok', function () {
    return view('pimpinan.tambah_kelompok');
});
Route::get('/rekap_data', function () {
    return view('pimpinan.rekap_data');
});

// admin
Route::get('/daftar_user', function () {
    return view('admin.daftar_user');
});
Route::get('/tambah_user', function () {
    return view('admin.tambah_user');
});