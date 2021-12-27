<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Petani;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){

        // validasi login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // pengondisian error
        if ($validator->fails()) {
            $val = $validator->errors()->first();
            return $this->error($val);
        }

        // proses login
        $petani = Petani::where('email', $request->email)->first();
        if ($petani) {
            if (password_verify($request->password, $petani->password)) {
                if ($petani->status==0) {
                    return $this->error('anda belum diverifikasi');
                }

                $tokenResult    = $petani->createToken('AccessToken');
                $token          = $tokenResult->token;
                $token->save();

                return response()->json([
                    'success'       => 1,
                    'message'       => 'selamat datang ' . $petani->nama,
                    'access_token'  => $tokenResult->accessToken,
                    'token_id'      => $token->id,
                    'petani'        => $petani
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Anda Tidak Terdaftar');
    }


    public function register(Request $request)
    {
        // validasi register
        $validator = Validator::make($request->all(), [
            'nama'          => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            'kelompok_id'   => 'required',
        ]);

        // pengondisian error
        if ($validator->fails()) {
            return response()->json([
                'success'       => 0,
                'message'       => 'Email telah dipakai',
            ], 401);            
        }

        // input register
        $petani = Petani::create([
            'nama'              => $request->get('nama'),
            'email'             => $request->get('email'),
            'password'          => bcrypt($request->get('password')),
            'kelompok_id'       => $request->get('kelompok_id'),
            'alamat'            => $request->get('alamat'),
            'telepon'           => $request->get('telepon'),
            'foto'              => $request->get('foto'),
        ]);


    
        $petani->save();

        return response()->json([
            'success'       => 1,
            'message'       => 'selamat datang ' . $petani->nama,
            'petani'     => $petani
        ]);
    
    }


    // pesan error
    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

}
