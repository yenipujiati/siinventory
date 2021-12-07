<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Item');
        $item = Item::select('item.*','category.name as category_id')
        ->join('category','category.id','=','item.category_id')->get();

        $item = Item::select('item.*','unit.name as unit_id')
        ->join('unit','unit.id','=','item.unit_id')->get();


        return view('admin\content\item\list', compact('item'));
    }

    public function add()
    {
        Session::put('title', 'Tambah Item');
        $category = Category::all();
        $unit = Unit::all();
        return view('admin/content/item/add', compact('category', 'unit'));

    }

    public function store(Request $request){
        $item = new Item();
        $item->barcode =$request->barcode;
        $item->name = $request->name;
        $item->price = $request->price;        
        $item->category_id = $request->category_id;
        $item->uunit_id = $request->unit_id;
        
        try {
            $item->save();
            return redirect(route('admin.item.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            return redirect(route('admin.item.index'))->with('pesan-gagal','Data gagal ditambahkan!');
        }
    }

    public function delete($id){
        $item = Item ::findOrFail($id);
        try {
            $item->delete();
            return redirect(route('admin.item.index')) ->with('pesan-berhasil','Data berhasil Dihapus!');
        }catch(\Exception $e){
            return redirect(route('admin.item.index'))->with('pesan-gagal','Data tidak dapat Dihapus!');
        }
    }

    public function edit($id){
        Session::put('title', 'Edit Item');
        $category = Category::all();
        $unit = Category::all();
        $item = Item::FindOrFail($id);
        return view('admin/content/item/edit', compact('item','category', 'unit'));
    }

    public function update(Request $request ,$id){

        $item= Item :: findOrFail($id);
        $item->barcode =$request->barcode;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;        
        $item->category_id = $request->category_id;
        $item->uunit_id = $request->unit_id;        

        try {
            $item->save($request->all());
            return redirect(route('admin.item.index')) ->with('pesan-berhasil','Data berhasil Diubah!');
        }
        catch(\Exception $e){
            return redirect(route('admin.item.index'))->with('pesan-gagal','Data gagal Diubah!');
        }
    }

}
