<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class isert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Udin',
            'role' => 'admin',
            'email' => 'Udin.k19@student.ukrimuniversity.ac.id',
            'password' => Hash::make('password'),
        ]);
    }
}
