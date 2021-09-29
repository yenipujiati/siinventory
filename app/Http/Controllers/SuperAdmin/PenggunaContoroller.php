<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;

class PenggunaContoroller extends Controller
{
    public function index(){
        Session::put('title','Deshboard');
        return view('superadmin/content/dashboard');
}
}
