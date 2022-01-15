<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('/login');
    }
    

    public function postlogin(Request $request)
    {   
        // if(Auth::attempt($request->only('email','password')))
        if(Auth::attempt($request->only('email','password')))
        {
            if (auth()->user()->level=="admin") {
                return redirect('/daftar_user')->with('info', 'Selamat Datang Admin!');
            } elseif (auth()->user()->level=="pimpinan") {
                return redirect('/dashboard_pimpinan')->with('info', 'Selamat Datang Pimpinan!');
            } else {
                return redirect('/dashboard_ketua')->with('info', 'Selamat Datang Ketua!');
            }  
        }
            return redirect('/login')->with('error', 'Email atau Password Anda Salah!!');

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    public function tampilReset(){
        return view('reset');
    }


    public function reset(Request $request){
        $name       = $request->name;
        $email      = $request->email;
        $telepon    = $request->telepon;

        $user = User::where('name', $name)
            ->where('email', $email)
            ->where('telepon', $telepon)
            ->first();
        // dd($user);
        if($user){
            $user['password'] = bcrypt($request->password);
            $user->save();
            Alert::success('Reset Password Berhasil');
            return view('login');
        }
        else{
            Alert::success('Reset Password Gagal');
            return view('reset');
        }
    }
}
