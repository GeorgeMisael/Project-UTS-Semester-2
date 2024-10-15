<?php

namespace Database\Seeders;

use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'jprs',
                'username' => 'jors',
                'email' => 'jors@example.com',
                'password' => Hash::make('1234'),
                'id_jenis_user' => 1, // This is related to jenis_users
                'status_user' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
