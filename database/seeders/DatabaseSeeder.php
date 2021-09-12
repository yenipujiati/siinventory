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
            'name' => 'Yeni Pujiati',
            'role' => 'superadmin',
            'email' => 'yeni.p19@student.ukrimuniversity.ac.id',
            'password' => Hash::make('password'),
        ]);

        DB::table('admins')->insert([
            'name' => 'Adimin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
