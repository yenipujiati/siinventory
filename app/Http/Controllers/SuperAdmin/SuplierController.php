<?php


namespace App\Http\Controllers\SuperAdmin;


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
        return view('superadmin\content\suplier\list', compact('suplier'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data Suplier');

        return view('superadmin/content/suplier/add');

    }

    public function store(Request $request){
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $suplier = new Suplier();
        $suplier->name =$request->name;
        $suplier->email =$request->email;
        $suplier->phone_number = $request->phone_number;
        $suplier->address = $request->address;
        $suplier->industry = $request->industry;
        try {
            $suplier->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.suplier.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.suplier.index'))->with('pesan-gagal','Data Gagal Ditambahkan');
        }
    }

    public function delete($id){
        //pastikan sudah ada data
        $suplier = Suplier ::findOrFail($id);
        try {
            $suplier->delete();
            //pesan notifikasi sukses
            return redirect(route('superadmin.suplier.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.suplier.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Data Suplier');
        $suplier = Suplier::FindOrFail($id);
        return view('superadmin/content/suplier/edit', compact('suplier'));
    }

    public function update(Request $request ,$id){
        $suplier= Suplier ::findOrFail($id);
        $suplier->name =$request->name;
        $suplier->email =$request->email;
        $suplier->phone_number = $request->phone_number;
        $suplier->address = $request->address;
        $suplier->industry = $request->industry;

        try {
            $suplier->save($request->all());
            return redirect(route('superadmin.suplier.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('superadmin.suplier.index'))->with('pesan-gagal','Data tidak dapat Diubah!');
        }
    }

    public function cetak()
    {
        Session::put('title', 'Data Suplier');
        $suplier = Suplier::get();
        return view('superadmin\content\suplier\cetak', compact('suplier'));
    }
}
