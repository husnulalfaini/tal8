<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CRUDPetaniController;
use App\Http\Controllers\api\SensorController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/InputLahan', [CRUDPetaniController::class, 'InputLahan']);
Route::post('/InputTanam', [CRUDPetaniController::class, 'InputTanam']);
Route::post('/InputPanen', [CRUDPetaniController::class, 'InputPanen']);
Route::post('/InputPesanan', [CRUDPetaniController::class, 'InputPesanan']);
Route::get('/GetKelompok', [CRUDPetaniController::class, 'GetKelompok']);
Route::get('/GetLahan/{id}', [CRUDPetaniController::class, 'GetLahan']);
Route::get('/GetTanam/{id}', [CRUDPetaniController::class, 'GetTanam']);
Route::get('/GetPanen/{id}', [CRUDPetaniController::class, 'GetPanen']);
Route::post('/UpdateLahan', [CRUDPetaniController::class, 'UpdateLahan']);
Route::post('/UpdateTanam', [CRUDPetaniController::class, 'UpdateTanam']);
Route::post('/UpdatePanen', [CRUDPetaniController::class, 'UpdatePanen']);

Route::post('/terimaSensor', [SensorController::class, 'terimaSensor']);

Route::get('/chartKelembapan', [SensorController::class, 'chartKelembapan'])->name('chartKelembapan');
Route::get('/chartPH', [SensorController::class, 'chartPH'])->name('chartPH');
