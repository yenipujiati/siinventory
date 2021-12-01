<?php


namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Costomer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;



class CostomerController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Costomer');
        $costomer = Costomer::all();
        return view('superadmin\content\costomer\list', compact('costomer'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data customer');

        return view('superadmin/content/costomer/add');
    }

    public function store(Request $request)
    {
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $costomer = new Costomer();
        $costomer->name = $request->name;
        $costomer->alamat = $request->alamat;
        $costomer->nomber = $request->nomber;
        $costomer->email = $request->email;



            $costomer->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.costomer.index'))->with('pesan-berhasil', 'Data berhasil ditambahkan!');
            // try {
            //$costomer->save();
            //pesan notifikasi sukses
            // return redirect(route('superadmin.costomer.index'))->with('pesan-berhasil', 'Data berhasil ditambahkan!');
            // } catch (\Exception $e) {
            //   //pesan notifikasi tidak sukses
            //   return redirect(route('superadmin.costomer.index'))->with('pesan-gagal', 'Data yang Anda gunakan sudah terdaftar. Silahkan menggunakan email yang Baru!');
        }


}
