<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Session;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{

    public function index()
    {
        //List Admin
        Session::put('title', 'Data Admin');

        $pengguna = Pengguna::all();

        return view('superadmin/content/pengguna/list', compact('pengguna'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tamba Data Admin');

        return view('superadmin/content/pengguna/add');

    }

    public function store(Request $request){
        //Menampilkan From tambah
        $pengguna = new Pengguna();
        $pengguna->name =$request->name;
        $pengguna->role =$request->role;
        $pengguna->email =$request->email;
        $pengguna->password = bcrypt('12345678');

        try {
            $pengguna->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.pengguna.index'));
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.pengguna.index'));
        }
    }
}
