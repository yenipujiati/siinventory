<?php


namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use Session;

class DashboardController extends Controller
{
    public function index(){
    Session::put('title','Dashboard');
        return view('superadmin/content/dashboard');
    }
}
