<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_users')->insert([
            [
                'id' => 1,
                'jenis_user' => 'SuperAdmin', // Example data
            ],
            [
                'id' => 2,
                'jenis_user' => 'Admin', // Example data
            ],
            [
                'id' => 3,
                'jenis_user' => 'User', // Example data
            ]
        ]);
    }
}
