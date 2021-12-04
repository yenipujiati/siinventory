<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Suplier;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Barang Masuk');
        $barang_masuk = BarangMasuk::select("barang_masuk.*",'supliers.name as penyuplai')
            -> join('supliers', 'supliers.id', '=', 'barang_masuk.suplier_id')
            ->orderBy('barang_masuk.id')
            ->paginate(10);
        return view('admin\content\barang_masuk\list', compact('barang_masuk'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data Barang Masuk');
        $penyuplai = Suplier::all();
        return view('admin/content/barang_masuk/add', compact('penyuplai'));

    }

    public function store(Request $request){
        $barang_masuk = new BarangMasuk();
        $barang_masuk->name =$request->name;
        $barang_masuk->stock =$request->stock;
        $barang_masuk->harga = $request->harga;
        $barang_masuk->suplier_id = $request->suplier_id;
        try {
            $barang_masuk->save();
            //pesan notifikasi sukses
            return redirect(route('admin.barang_masuk.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('admin.barang_masuk.index'))->with('pesan-gagal','Data gagal ditambahkan!');
        }
    }

    public function delete($id){
        //pastikan sudah ada data
        $barang_masuk = BarangMasuk ::findOrFail($id);
        try {
            $barang_masuk->delete();
            //pesan notifikasi sukses
            return redirect(route('admin.barang_masuk.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('admin.barang_masuk.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Data Barang Masuk');
        $penyuplai = Suplier::all();
        $barang_masuk = BarangMasuk::FindOrFail($id);
        return view('admin/content/barang_masuk/edit', compact('barang_masuk','penyuplai'));
    }

    public function update(Request $request ,$id){

        $barang_masuk= BarangMasuk :: findOrFail($id);
        $barang_masuk->name =$request->name;
        $barang_masuk->stock =$request->stock;
        $barang_masuk->suplier_id = $request->suplier_id;
        $barang_masuk->harga = $request->harga;

        try {
            $barang_masuk->save($request->all());
            return redirect(route('admin.barang_masuk.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('admin.barang_masuk.index'))->with('pesan-gagal','Data gagal Diubah!');
        }
    }

    public function cetak()
    {
        Session::put('title', 'Data Barang Masuk');
        $barang_masuk = BarangMasuk::get();
        return view('admin\content\barang_masuk\cetak', compact('barang_masuk'));
    }
}
