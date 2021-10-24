<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = "barang_masuk";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'stock', 'suplier_id', 'harga',
    ];
}
