<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(AdminSeeder::class);

        DB::table('admins')->insert([
            'username' => 'Enter2025',
            'password' => Hash::make('secret123'), // change this password!
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
