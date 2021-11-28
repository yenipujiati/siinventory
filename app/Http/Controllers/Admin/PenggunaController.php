<?php


namespace App\Http\Controllers\Admin;


use App\Exports\DataPengguna;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{

    public function index()
    {
        //List Admin
        Session::put('title', 'Data Admin');

        $pengguna = Pengguna::all();
//        dd($pengguna);

        return view('admin/content/pengguna/list', compact('pengguna'));
//        return view('admin/content/pengguna/list');
    }

    
}
