<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Session;

class DashboardController extends Controller
{
    public function index(){
        //return view('admin/dashboard');
        Session::put('title','Selamat Datang di Sistem Informasi Inventory');
        return view('admin/content/dashboard');
    }
}
