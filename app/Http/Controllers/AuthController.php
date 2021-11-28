<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Util\Helper;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Mail;

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

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'role'=>'admin', 'status'=>1])) {
            return redirect()->intended('/admin/dashboard');
        } else if (Auth::guard('superadmin')->attempt(['email' => $request->email, 'password' => $request->password,'role'=>'superadmin', 'status'=>1])) {
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

    public function reset(){
        return view('reset');

    }

    public function forgot(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        if(Pengguna::where('email', $request->email)->exists()){
            $pengguna = Pengguna::where('email', $request->email)->first();
            $token = $this->generateToken(24);

            $date =  date_create(date('Y-m-d H:i:s'));
            date_add($date, date_interval_create_from_date_string('5 minutes'));
            $expired =date_format($date, 'Y-m-d H:i:s' );

            $pengguna->token = $token;
            $pengguna->expired =$expired;

            try{
                $pengguna->save();
//                $pengguna->save;
//                dd($token, $pengguna);

                $email = Helper :: encrypt($request->email);
                $reset_token = $pengguna->token;
                $link = route('auth.password',[$email,$reset_token]);

                Mail :: to($request->email)->send(new ResetPassword($pengguna->name, $link));

                return redirect(route('auth.reset'))->with('pesan','Silahkan cek email Anda. Token akan kadaluwarsa dalam waktu 5 menit');

            }
            catch(\Exception $e){
                return redirect(route('auth.reset'))->with('pesan','Gagal mengatur ulang password. Pastikan Input email yang tepat');
            }
        }
        else{

        }
        return redirect(route('auth.reset'))->with('pesan','Email belum Terdaftar');
    }

    public function password($emailHash, $token){
        date_default_timezone_set('Asia/Jakarta');

        $email = Helper::decrypt($emailHash);
        $pengguna = Pengguna::where('email',$email)->first();

        if ($pengguna->token == $token) {

            $expired = $pengguna->expired;
            $now = date('Y-m-d H:i:s');

            if (strtotime($expired) > strtotime($now)) {
                return  view('renew', compact('emailHash'));
            }else{
                return redirect(route('auth.reset'))->with('pesan','Silahkan mengatur ulang, waktu anda habis');
            }

        }else{
            return redirect(route('auth.reset'))->with('pesan','Token tidak valid');
        }
    }

    public function renew(Request $request){
        date_default_timezone_set('Asia/Jakarta');

        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|same:password',
            'token' => 'required',
        ]);

        $email = Helper::decrypt($request->token);
        $pengguna = Pengguna ::where('email', $email)->first();
        $pengguna->password = bcrypt ( $request-> password);

        try{
            $pengguna->save();
            return redirect(route('auth.reset'))->with('pesan','Password Berhasil Diubah');
        }
        catch(\Exception $e){
            return redirect(route('auth.reset'))->with('pesan','Gagal mengatur ulang password.');
        }
    }

    private function generateToken($length = 10){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
