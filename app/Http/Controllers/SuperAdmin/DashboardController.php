<?php


namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        return view('superadmin/dashboard');
    }
}
