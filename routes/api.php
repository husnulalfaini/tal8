<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\CRUDPetaniController;


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
Route::get('/GetKelompok', [CRUDPetaniController::class, 'GetKelompok']);
Route::get('/GetLahan/{id}', [CRUDPetaniController::class, 'GetLahan']);
Route::get('/GetTanam/{id}', [CRUDPetaniController::class, 'GetTanam']);
