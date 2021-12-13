<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Item');
        $item = Product::select('products.*','category.name as category_name','unit.name as unit_name')
        ->join('category','category.id','=','products.category_id')
        ->join('unit','unit.id','=','products.unit_id')
        ->get();

        return view('superadmin\content\item\list', compact('item'));
    }

    public function add()
    {
        Session::put('title', 'Tambah Item');
        $category = Category::all();
        $unit = Unit::all();
        return view('superadmin/content/item/add', compact('category', 'unit'));

    }

    public function store(Request $request){
        $item = new Product();
        $item->barcode =$request->barcode;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->unit_id = $request->unit_id;

        try {
            $item->save();
            return redirect(route('superadmin.item.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            return redirect(route('superadmin.item.index'))->with('pesan-gagal','Data gagal ditambahkan!');
        }
    }

    public function delete($id){
        $item = Product::findOrFail($id);
        try {
            $item->delete();
            return redirect(route('superadmin.item.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            return redirect(route('superadmin.item.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Item');
        $category = Category::all();
        $unit = Category::all();
        $item = Product::FindOrFail($id);
        return view('superadmin/content/item/edit', compact('item','category', 'unit'));
    }

    public function update(Request $request ,$id){

        $item=Product :: findOrFail($id);
        $item->barcode =$request->barcode;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->category_id = $request->category_id;
        $item->unit_id = $request->unit_id;

        try {
            $item->save($request->all());
            return redirect(route('superadmin.item.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('superadmin.item.index'))->with('pesan-gagal','Data gagal Diubah!');
        }
    }

}
