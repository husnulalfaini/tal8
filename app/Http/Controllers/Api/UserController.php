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

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            $val = $validator->errors()->first();
            return $this->error($val);
        }

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
                    'petani'     => $petani
                ]);
            }
            return $this->error('Password Salah');
        }
        return $this->error('Anda Tidak Terdaftar');
    }
    //     if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
    //         $petani = Auth::Petani();
    //         $success =  $petani->createToken('nApp')->accessToken;
    //         return response()->json([
    //             'success' => true,
    //             'token' => $success,
    //             'petani' => Auth::Petani()
    //         ], $this->successStatus);
    //     }
    //     else{
    //         return response()->json(['error'=>'Unauthorised'], 401);
    //     }
    // }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'kelompok_id' => 'required',
        ]);

        if ($validator->fails()) {
            $val = $validateData->errors()->first();
            return $this->error($val);
        }

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

    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }

}
