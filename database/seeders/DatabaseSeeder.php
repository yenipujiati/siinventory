<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Yen',
            'role' => 'superadmin',
            'email' => 'yen@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image.png',
        ]);

        DB::table('admins')->insert([
            'name' => 'Emard',
            'role' => 'superadmin',
            'email' => 'emard@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image.png',
        ]);

        DB::table('admins')->insert([
            'name' => 'Ber',
            'role' => 'superadmin',
            'email' => 'ber@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image.png',
        ]);

        DB::table('supliers')->insert([
            'name' => 'Sal',
            'email' => 'sal@gmail.com',
            'phone_number' => '081321741255',
            'address' => 'Jogja',
            'industry' => 'PT. Saravana',
        ]);

        DB::table('barang_masuk')->insert([
            'name' => 'California Gold Nutrition',
            'stock' => 100,
            'suplier_id' => 1,
            'Harga' => 3000000,
        ]);
    }
}
