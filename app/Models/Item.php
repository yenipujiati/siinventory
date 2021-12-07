<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = "item";
    protected $primaryKey = "id";
    protected $fillable = [
        'barcode', 'name', 'category_id', 'unit_id', 'price', 'stock',
    ];
    public $timestamps = false;
}