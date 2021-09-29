<?php


namespace App\Models;


class Pengguna extends Model
{
    protected $table = "admins";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'role', 'email', 'password','token', 'status',
    ];
}
