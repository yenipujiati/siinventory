<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Costomer extends Model
{

    protected $table = "costomer";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'alamat ','nomber', 'email',
    ];
    public $timestamps = false;
}
