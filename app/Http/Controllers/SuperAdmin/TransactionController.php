<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Costomer;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        Session::put('title', 'Data Transaksi');
        $transaksi = Transaction::select('transactions.*','costomer.name','admins.name as admin_name')
            ->join('costomer','costomer.id','=','transactions.costomer_id')
            ->join('admins','admins.id','=','transactions.admin_id')
            ->get();

        return view('superadmin\content\transaksi\list', compact('transaksi'));
    }

    public function detail($id)
    {
        Session::put('title', 'Detail Transaksi');

        $transaksi = Transaction::select('transactions.*','costomer.name','admins.name as admin_name')
            ->join('costomer','costomer.id','=','transactions.costomer_id')
            ->join('admins','admins.id','=','transactions.admin_id')
            ->where('transactions.id',$id)
            ->first();

        $item = Item::select('items.*','products.name as product_name','products.price as product_price')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('products','products.id','=','items.product_id')
            ->where('transactions.id',$id)
            ->get();

        return view('superadmin\content\transaksi\detail', compact('transaksi','item'));
    }

    public function add()
    {
        Session::put('title','Tambah Transaksi Baru');
        $product = Product::all();
        $costomer = Costomer::all();
//        $price = $barang_masuk->harga/$barang_masuk->stock->first();

        return view('superadmin\content\transaksi\add', compact('product','costomer'));
    }

    public function store(Request $request){
        //insert ke dua table
        DB::beginTransaction();
//        try {
            //semua proses insert didalam sini
            $send = $request->send;
            $costomer_id = $request->costomer_id;
            $admin_id =$request->admin_id;
            $transaksi = new Transaction();
            $transaksi->date = date('Y-m-d H:i:s');
            $transaksi->costomer_id  = $costomer_id;
            $transaksi->admin_id  = $admin_id;
            $transaksi->save();

            dd($costomer_id);

//            DB::commit();
//            return redirect(route('superadmin.costomer.index'))->with('pesan','Transaksi Sukses');
//        }catch (\Exception $e) {
//            DB::rollBack();
//            return redirect(route('superadmin.costomer.index'))->with('pesan','Transaksi Gagal');
//        }
    }

    public function cetak()
    {
        Session::put('title', 'Data Transaksi');
        $transaksi = Transaction::get();
        return view('superadmin\content\transaksi\cetak', compact('transaksi'));
    }
}
