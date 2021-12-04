<?php


namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Costomer;

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

        $item = Item::select('items.*','barang_masuk.name as barang_masuk_name','barang_masuk.harga as barang_masuk_harga')
            ->join('transactions','transactions.id','=','items.transaction_id')
            ->join('barang_masuk','barang_masuk.id','=','items.barang_id')
            ->where('transactions.id',$id)
            ->get();

        return view('superadmin\content\transaksi\detail', compact('transaksi','item'));
    }

    public function add()
    {
        Session::put('title','Tambah Transaksi Baru');
        $barang_masuk = BarangMasuk::all();
        $costomer = Costomer::all();
//        $price = $barang_masuk->harga/$barang_masuk->stock->first();

        return view('superadmin\content\transaksi\add', compact('barang_masuk','costomer'));
    }

    public function store(Request $request){
        //Menampilkan From tambah

        //upload file
        //1. Store file ke storage
        //2.getHasNameFromFile

        $transaksi = new Transaction();
        $transaksi->date =$request->date;
        $transaksi->costomer_id =$request->costomer_id;
        try {
            $transaksi->save();
            //pesan notifikasi sukses
            return redirect(route('superadmin.transaksi.index')) ->with('pesan-berhasil','Data berhasil ditambahkan!');
        }catch(\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.transaksi.index'))->with('pesan-gagal','Data gagal ditambahkan');
        }
    }

    public function cetak()
    {
        Session::put('title', 'Data Transaksi');
        $transaksi = Transaction::get();
        return view('superadmin\content\transaksi\cetak', compact('transaksi'));
    }
}
