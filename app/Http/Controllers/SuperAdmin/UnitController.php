<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Unit');
        $unit = Unit::all();
        return view('superadmin\content\unit\list', compact('unit'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data Unit');

        return view('superadmin/content/unit/add');

    }

    public function store(Request $request){
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $unit = new Unit();
        $unit->name =$request->name;
        
        try {
            $unit->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.unit.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.unit.index'))->with('pesan-gagal','Data Gagal Ditambahkan');
        }
    }

    public function delete($id){
        //pastikan sudah ada data
        $unit = Unit ::findOrFail($id);
        try {
            $unit->delete();
            //pesan notifikasi sukses
            return redirect(route('superadmin.unit.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.unit.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Data unit');
        $unit = Unit::FindOrFail($id);
        return view('superadmin/content/unit/edit', compact('unit'));
    }

    public function update(Request $request ,$id){
        $unit= Unit ::findOrFail($id);
        $unit->name =$request->name;

        try {
            $unit->save($request->all());
            return redirect(route('superadmin.unit.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('superadmin.unit.index'))->with('pesan-gagal','Data tidak dapat Diubah!');
        }
    }
}
