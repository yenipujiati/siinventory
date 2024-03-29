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
            'name' => 'En',
            'role' => 'superadmin',
            'email' => 'yeni.p19@student.ukrimuniversity.ac.id',
            'password' => Hash::make('password'),
            'image' => 'image.png',
        ]);

        DB::table('admins')->insert([
            'name' => 'Udin',
            'role' => 'admin',
            'email' => 'udin@gmail.com',
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

        DB::table('costomer')->insert([
            'name' => 'sayang',
            'alamat' => 'Jl.jadi sayang',

            'email' => 'sayang@gmail.com',
            'nomber' => '082322889911',
        ]);

        DB::table('transactions')->insert([
            'id' => 1,
            'date' => '2021-12-16 21:35:21',
            'costomer_id' => 1,
            'admin_id' => 1,
        ]);

        DB::table('category')->insert([
            'id'        => 1,
            'name'      => 'Perabot',

        ]);

        DB::table('category')->insert([
            'id'        => 2,
            'name'      => 'electronic',

        ]);

        DB::table('category')->insert([
            'id'        => 3,
            'name'      => 'Makanan',
        ]);

        DB::table('unit')->insert([
            'id'        => 1,
            'name'      => 'Kilogram',

        ]);

        DB::table('unit')->insert([
            'id'        => 2,
            'name'      => 'Buah',

        ]);

        DB::table('unit')->insert([
            'id'        => 3,
            'name'      => 'Liter',
        ]);

        DB::table('products')->insert([
            'id'            => 1,
            'barcode'       => 'A1111',
            'name'          => 'Meja',
            'category_id'   => 1,
            'unit_id'       => 2,
            'price'         => '700000',
            'stock'          => 10,
        ]);

        DB::table('products')->insert([
            'id'            => 2,
            'barcode'       => 'A1112',
            'name'          => 'Kulkas',
            'category_id'   => 2,
            'unit_id'       => 2,
            'price'         => '2000000',
            'stock'          => 100,
        ]);

        DB::table('items')->insert([
            'id' => 1,
            'qty' => 1,
            'price' => 700000,
            'transaction_id' => 1,
            'product_id' => 1,
        ]);

        DB::table('items')->insert([
            'id' => 2,
            'qty' => 2,
            'price' => 1400000,
            'transaction_id' => 1,
            'product_id' => 1,
        ]);

    }
}
