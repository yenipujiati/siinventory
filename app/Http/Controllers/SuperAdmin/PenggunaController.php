<?php


namespace App\Http\Controllers\SuperAdmin;


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

        return view('superadmin/content/pengguna/list', compact('pengguna'));
//        return view('superadmin/content/pengguna/list');
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data Admin');

        return view('superadmin/content/pengguna/add');

    }

    public function store(Request $request){
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $request->file('image')->store('public');
        $nameImage = $request->file('image')->hashName();
        $pengguna = new Pengguna();
        $pengguna->name =$request->name;
        $pengguna->role =$request->role;
        $pengguna->email =$request->email;
        $pengguna->password = bcrypt('12345678');
        $pengguna->image = $nameImage;
        try {
            $pengguna->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.pengguna.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal','Email yang Anda gunakan sudah terdaftar. Silahkan menggunakan email yang Baru!');
        }
    }

    public function delete($id){
        //pastikan sudah ada data
        $pengguna = Pengguna ::findOrFail($id);
        try {
            $pengguna->delete();
            //pesan notifikasi sukses
            return redirect(route('superadmin.pengguna.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Data Admin');
        $pengguna = Pengguna::FindOrFail($id);
        return view('superadmin/content/pengguna/edit', compact('pengguna'));
    }

    public function update(Request $request ,$id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->name = $request->name;
        $pengguna->role = $request->role;
        $pengguna->email = $request->email;
        $pengguna->status = $request->status;
        $pengguna->image = $request->image;

        try {
            $pengguna->save($request->all());
            return redirect(route('superadmin.pengguna.index'))->with('pesan-berhasil', 'Data berhasil Diubah!');
        } catch (\Exception $e) {
            return redirect(route('superadmin.pengguna.index'))->with('pesan-gagal', 'Data tidak dapat Diubah!');
        }
    }
    public function export(){
        return Excel::download(new DataPengguna(),'pengguna.xlsx');
    }
    public function cetak()
    {
        Session::put('title', 'Data Pengguna');
        $pengguna = Pengguna::get();
        return view('superadmin\content\pengguna\cetak', compact('pengguna'));
    }
}
