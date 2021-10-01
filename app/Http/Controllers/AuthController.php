<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Util\Helper;

class AuthController extends Controller
{
    public function index(){
        //untuk halaman login
        return view('login');

        //contoh panggil helper
//        $date = "2001-11-24";
//        dd(Helper::dateConverter($date));
    }

    public function verify(Request $request){
        //untuk halaman login
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/admin/dashboard');
        } else if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/superadmin/dashboard');
        }else{
            //user tidak ditemukan
            return redirect('login')->with('pesan','Email dan password salah !');
        }
    }

    //function untuk logout
    public function logout(){
        if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }elseif (Auth::guard('superadmin')->check()){
            Auth::guard('superadmin')->logout();
        }
        return redirect('login');
    }
}
