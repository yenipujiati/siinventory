<?php

namespace App\Http\Controllers;

use App\Util\Helper;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index() {
        //halaman login

//        $date = "09-06-2001";
//        dd(Helper::dateConverter($date));
//        dd($date);

        return view('login');
    }

    public function verify(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>'admin'])) {
            return redirect()->intended('/admin/dashboard');
        }else if (Auth::guard('superadmin')->attempt(['email'=>$request->email, 'password'=>$request->password, 'role'=>'superadmin'])) {
            return redirect()->intended('/superadmin/dashboard');
        }else{
            //saat user yang diminta tidak ditemukan
            return redirect('/login')->with('Pesan','Data yang anda masukkan salah');
        }
    }

    public function logout() {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }elseif (Auth::guard('superadmin')->check()) {
            Auth::guard('superadmin')->logout();
        }
        return redirect('/login');
    }
}
