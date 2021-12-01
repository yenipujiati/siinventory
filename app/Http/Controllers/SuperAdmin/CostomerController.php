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
        Session::put('title', 'Tambah Data Customer');

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
        try {
            $costomer->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.costomer.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.costomer.index'))->with('pesan-gagal','Email yang Anda gunakan sudah terdaftar. Silahkan menggunakan email yang Baru!');
        }
    }

        public function delete($id){
            //pastikan sudah ada data
            $costomer = Costomer ::findOrFail($id);
            try {
                $costomer->delete();
                //pesan notifikasi sukses
                return redirect(route('superadmin.costomer.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
            }catch(\Exception $e){
                //pesan notifikasi tidak sukses
                return redirect(route('superadmin.costomer.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
            }
        }
    
        public function edit($id){
            Session::put('title', 'Edit Data Costumer');
            $costomer = Costomer::FindOrFail($id);
            return view('superadmin/content/costomer/edit', compact('costomer'));
        }
    
        public function update(Request $request ,$id){
            $costomer= Costomer ::findOrFail($id);
            $costomer->name = $request->name;
            $costomer->alamat = $request->alamat;
            $costomer->nomber = $request->nomber;
            $costomer->email = $request->email;
    
            try {
                $costomer->save($request->all());
                return redirect(route('superadmin.costomer.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
            }
            catch(\Exception $e){
                return redirect(route('superadmin.costomer.index'))->with('pesan-gagal','Data tidak dapat Diubah!');
            }
        }


}
