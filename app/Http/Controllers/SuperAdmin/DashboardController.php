<?php


namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use MongoDB\Driver\Session;
use Session;

class DashboardController extends Controller
{
    public function index(){
        Session::put('title','Deshboard');
        return view('superadmin/content/dashboard');
    }
}
