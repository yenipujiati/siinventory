<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    protected $table = "unit";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
}