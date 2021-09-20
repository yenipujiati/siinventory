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
            'name' => 'Emmard Yedija',
            'role' => 'superadmin',
            'email' => 'emmard.y19@student.ukrimuniversity.ac.id',
            'password' => Hash::make('password'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Udin',
            'role' => 'admin',
            'email' => 'Udin.k19@student.ukrimuniversity.ac.id',
            'password' => Hash::make('password'),
        ]);
    }
}
