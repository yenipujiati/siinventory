<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Suplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Suplier');
        $suplier = Suplier::all();
        return view('admin\content\suplier\list', compact('suplier'));
    }

    
}
