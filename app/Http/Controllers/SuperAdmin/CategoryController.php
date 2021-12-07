<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data category');
        $category = Category::all();
        return view('superadmin\content\category\list', compact('category'));
    }

    public function add()
    {
        //Menampilkan From tambah
        Session::put('title', 'Tambah Data Category');

        return view('superadmin/content/category/add');

    }

    public function store(Request $request){
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $category = new Category();
        $category->name =$request->name;
        
        try {
            $category->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.category.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.category.index'))->with('pesan-gagal','Data Gagal Ditambahkan');
        }
    }

    public function delete($id){
        //pastikan sudah ada data
        $category = Category ::findOrFail($id);
        try {
            $category->delete();
            //pesan notifikasi sukses
            return redirect(route('superadmin.category.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.category.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Data Category');
        $category = Category::FindOrFail($id);
        return view('superadmin/content/category/edit', compact('category'));
    }

    public function update(Request $request ,$id){
        $category= Category ::findOrFail($id);
        $category->name =$request->name;

        try {
            $category->save($request->all());
            return redirect(route('superadmin.category.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('superadmin.category.index'))->with('pesan-gagal','Data tidak dapat Diubah!');
        }
    }
}
